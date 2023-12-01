from app.domain.dtos.todo_dto import TodoDTO
from app.domain.models.todo import Todo
from sqlalchemy import insert
from sqlalchemy.orm import Session


class TodoRepository:
    
    database_engine = None
    
    def __init__(self, database_engine: database_engine):
        self.database_engine = database_engine
        
    def get_session(self):
        return Session(self.database_engine)
        
    def get_all(self):
        session = self.get_session()
        todos = session.query(Todo).all()
        
        todo_list = []
        for todo in todos:
            todo_list.append(todo.as_dict())
        
        return todo_list

    def get(self, id: int):
        session = self.get_session()
        todo = session.query(Todo).get(id)
        return todo.as_dict()

    def create(self, todo_dto: TodoDTO):
        session = self.get_session()
        todo = Todo(
            title=todo_dto.title,
            description=todo_dto.description
        )
        session.add(todo)
        session.commit()
        session.refresh(todo)
        return todo.as_dict()
    
    def update(self, id: int, todo_dto: TodoDTO):
        session = self.get_session()
        todo = session.query(Todo).get(id)
        todo.title = todo_dto.title
        todo.description = todo_dto.description
        session.add(todo)
        session.commit()
        session.refresh(todo)
        return todo.as_dict()

    def destroy(self, id: int):
        session = self.get_session()
        session.query(Todo).filter(Todo.id == id).delete()
        session.commit()
