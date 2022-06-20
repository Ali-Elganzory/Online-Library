from math import ceil
from platform import release
import string
from bs4 import BeautifulSoup
import requests
import argparse
import pymysql
import json

host=''
username=''
password=''
db=''

import os

script_dir = os.path.dirname(__file__)
rel_path = "../../config/db.json"
abs_file_path = os.path.join(script_dir, rel_path)

with open(abs_file_path, 'r') as config_file:
    config_data = json.load(config_file)
    host = config_data['host']
    username = config_data['username']
    password = config_data['password']
    db = config_data['name']

parser = argparse.ArgumentParser()
parser.add_argument('--url',
                    help='Goodreads list to scrape',
                    default='https://www.goodreads.com/list/show/134.Best_Non_Fiction_no_biographies_')
parser.add_argument('--number',
                    help='Number of books to scrape',
                    type=int,
                    default=120)
args = parser.parse_args()
url = args.url
num = args.number

headers = {
    'User-Agent': 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:78.0) Gecko/20100101 Firefox/78.0',
    'Accept-Language': 'en-US,en;q=0.5'
}
base = "https://www.goodreads.com"
data = []
count = num
for j in range(ceil(num/100)):
    page = requests.get(url, headers=headers)
    soup = BeautifulSoup(page.content, "lxml")

    bookBoxes = soup.find_all('a', class_="bookTitle")

    for i, bookBox in enumerate(bookBoxes):
        if count == 0:
            break
        bookpageurl = bookBox['href']
        bookpage = requests.get(base+bookpageurl)
        book = BeautifulSoup(bookpage.content, "lxml")
        title = ""
        author = ""
        try:
            title = book.find('h1').text
            title = title.rstrip().lstrip()
            author = book.find('a', class_="authorName").span.text
            author = author.rstrip().lstrip()
        except:
            continue

        print(title)

        image = ""
        description = ""
        try:
            image = book.find('div', class_="bookCoverPrimary").a.img['src']
        except AttributeError:
            print("This book has no image")
        try:
            description = book.find('div', id="description").find_all("span")[-1].text
            description = description.rstrip().lstrip()
        except AttributeError:
            print("This book has no description")

        tup = tuple([title, author, description, image, '0'])
        data.append(tup)
        count -= 1

    url = base+soup.find('a', {'rel':'next'})['href']

scrape_db = pymysql.connect(host = host,
                            user = username,
                            password = password,
                            database = db)

mySql_insert = """INSERT INTO BOOKS (TITLE, AUTHOR, DESCRIPTION, IMAGE_URL, VIEWS)
                    VALUES (%s,%s,%s,%s,%s)"""

cursor = scrape_db.cursor()
cursor.executemany(mySql_insert, data)
scrape_db.commit()
scrape_db.close()