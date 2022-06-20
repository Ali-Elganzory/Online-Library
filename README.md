# Online-Library
 

## Prerequisites:
- MySQL server.
- PHP >= 8.1.
- Python 3 and pip.

<br>

## Running

There are two ways.

1. Run the `launch.sh` script.

```bash
. launch.sh
```

This will
- Initialize the database and its tables and initial data.
- Scrap the web for book information and add it to the database.
- Run the books recommender system.
- Run a local php server to serve the app at `localhost:9000`.

2. Run the commands

```powershell
python scripts/init_database.py
python scripts/book_scraper/scraper.py          <--[optional]
python scripts/recommender_system/recommend.py  <--[optional]
php -S localhost:9000
```

## Users

**Normal user**
Username: Conner Walsh
Password: 111111

**Admin user**
Username: admin
Password: admin