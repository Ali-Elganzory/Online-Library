import json

import pandas as pd

from sqlalchemy import create_engine
from sqlalchemy.engine.mock import MockConnection

COLUMN_NAMES = ["user_id", "book_id", "rating"]


def __engine() -> MockConnection:
    with open('config/db.json') as f:
        config = json.load(f)
    return create_engine(
        f"mysql+pymysql://{config['username']}:{config['password']}@{config['host']}:3306/{config['name']}")


engine: MockConnection = __engine()


def all_ratings() -> pd.DataFrame:
    return pd.read_sql_table('reviews', engine, columns=COLUMN_NAMES)


def save_recommendations(df: pd.DataFrame) -> None:
    df.to_sql('recommendations', engine, method='multi', if_exists='replace')
