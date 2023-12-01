from app.domain.repositories.todo_repository import TodoRepository
from app.domain.services.todo_service import TodoService

class Domain:

    todo_service: TodoService

    def __init__(self, database_engine):
        self.todo_service = TodoService(
            todo_repository=TodoRepository(database_engine)
        )

def build_domain(database_engine):
    return Domain(database_engine)
