from app.domain.domain import build_domain
from app.http.http import start_http_server
from app.pubsub.pubsub import start_pubsub_client
from lib.database import init_database

import os
import sys

sys.path.insert(0, os.path.realpath(__file__))

database_engine = init_database()

domain = build_domain(database_engine
                      )
start_http_server(domain)
start_pubsub_client(domain)
