from app.domain.repositories.todo_repository import TodoRepository
from app.domain.dtos.todo_dto import TodoDTO


class TodoService:
    
    todo_repository: TodoRepository

    def __init__(self, todo_repository: TodoRepository):
        self.todo_repository = todo_repository

    def get_all(self):
        return self.todo_repository.get_all()

    def get(self, id: int):
        return self.todo_repository.get(id)

    def create(self, todo_dto: TodoDTO):
        return self.todo_repository.create(todo_dto)

    def update(self, id: int, todo_dto: TodoDTO):
        return self.todo_repository.update(id, todo_dto)

    def destroy(self, id: int):
        return self.todo_repository.destroy(id)

