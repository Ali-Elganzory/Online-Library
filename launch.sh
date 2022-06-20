# Install python requirements.
pip install -r requirements.txt

# Initialize database.
python scripts/init_database/init_database.py

# Scrap books from the web.
python scripts/book_scraper/scraper.py

# Run the recommender system.
python scripts/recommender_system/recommend.py repeat

# Run server.
python scripts/runner.py