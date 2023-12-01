from flask import Flask


class HTTPServer:
    app: Flask

    def __init__(self):
        self.app = Flask(__name__)

    def add_route(self, method, path: str, handler):
        self.app.add_url_rule(path, method + "-" + path, handler, methods=[method])

    def run(self):
        self.app.run(
            host="0.0.0.0"
        )
