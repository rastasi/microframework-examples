from sqlalchemy import create_engine
from sqlalchemy.orm import Session

import os

def init_database():
    user = os.environ["DATABASE_USER"]
    password = os.environ["DATABASE_PASSWORD"]
    host = os.environ["DATABASE_HOST"]
    database = os.environ["DATABASE_NAME"]
    connection_uri = f"mysql+pymysql://{user}:{password}@{host}/{database}?charset=utf8mb4"
    engine = create_engine(connection_uri, echo=True)
    engine.connect()
    return engine
