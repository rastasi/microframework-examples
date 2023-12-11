package domain

import "github.com/google/uuid"

type TodoServiceInterface interface {
	All() *[]TodoModel
	Get(id uuid.UUID) *TodoModel
	Create(todo *TodoModel) *TodoModel
	Update(id uuid.UUID, todo *TodoModel) *TodoModel
	Destroy(id uuid.UUID)
}

type TodoService struct {
	TodoRepository TodoRepositoryInterface
}

func (s TodoService) All() *[]TodoModel {
	todos := s.TodoRepository.All()
	return todos
}

func (s TodoService) Get(id uuid.UUID) *TodoModel {
	todo := s.TodoRepository.Get(id)
	return todo
}

func (s TodoService) Create(todo *TodoModel) *TodoModel {
	return s.TodoRepository.Create(todo)
}

func (s TodoService) Update(id uuid.UUID, todo *TodoModel) *TodoModel {
	todo_ := s.TodoRepository.Update(id, todo)
	return todo_
}

func (s TodoService) Destroy(id uuid.UUID) {
	s.TodoRepository.Destroy(id)
}
