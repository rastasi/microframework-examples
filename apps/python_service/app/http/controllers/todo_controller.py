from flask import request, Response
from app.domain.services.todo_service import TodoService
from app.domain.dtos.todo_dto import TodoDTO


class TodoController:
    todo_service: TodoService = {}

    def __init__(self, todo_service: TodoService):
        self.todo_service = todo_service

    def index(self) -> Response:
        todos = self.todo_service.get_all()
        return todos, 200

    def show(self, todo_id: int) -> Response:
        todo = self.todo_service.get(todo_id)
        return todo, 200

    def create(self) -> Response:
        payload = request.get_json(force=True)
        todo_dto = TodoDTO(
            title=payload['title'],
            description=payload['description'],
        )
        todo = self.todo_service.create(todo_dto)
        return todo, 201

    def update(self, todo_id: int) -> Response:
        payload = request.get_json()
        todo_dto = TodoDTO(
            title=payload['title'],
            description=payload['description'],
        )
        todo = self.todo_service.update(todo_id, todo_dto)
        return todo, 200

    def destroy(self, todo_id: int) -> Response:
        self.todo_service.destroy(todo_id)
        return "No content", 204
