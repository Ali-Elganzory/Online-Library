# Install python requirements.
pip install -r requirements.txt

# Initialize database.
python scripts/init_database/init_database.py

# Scrap books from the web.
python scripts/book_scraper/scraper.py --number 25

# Run the recommender system.
python scripts/recommender_system/recommend.py repeat &> /dev/null &

# Run server.
php -S localhost:9000 &> /dev/null &