from app.http.controllers.todo_controller import TodoController
from app.http.http_server import HTTPServer


def start_http_server(domain):
    todo_controller = TodoController(domain.todo_service)

    http_server = HTTPServer()

    http_server.add_route('GET', '/todo', todo_controller.index)
    http_server.add_route('GET', '/todo/<todo_id>', todo_controller.show)
    http_server.add_route('POST', '/todo/', todo_controller.create)
    http_server.add_route('PUT', '/todo/<todo_id>', todo_controller.update)
    http_server.add_route('DELETE', '/todo/<todo_id>', todo_controller.destroy)

    http_server.run()
