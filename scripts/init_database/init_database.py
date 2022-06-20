import os
import sys
import json

from sqlalchemy import create_engine, text
from sqlalchemy.engine.mock import MockConnection


def __engine() -> MockConnection:
    with open('config/db.json') as f:
        config = json.load(f)
    return create_engine(
        f"mysql+pymysql://{config['username']}:{config['password']}@{config['host']}:3306/{config['name']}")


if __name__ == "__main__":
    engine: MockConnection = __engine()

    with engine.connect() as connection:
        script_dir = os.path.dirname(__file__)
        rel_path = "init_database.sql"
        abs_file_path = os.path.join(script_dir, rel_path)

        with open(abs_file_path) as f:
            for stmt in f.read().split(';'):
                if len(stmt.strip()) > 0:
                    query = text(stmt)
                    connection.execute(query)

        print("[Database initialization]: succeeded.")
