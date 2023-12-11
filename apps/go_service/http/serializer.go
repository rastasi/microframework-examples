package http

import (
	"go_service/domain"
	"time"

	"github.com/google/uuid"
)

type Todo struct {
	ID          uuid.UUID `json:"id"`
	Title       string    `json:"title"`
	Description string    `json:"description"`
	CreatedAt   time.Time `json:"createdAt"`
}

type Serializer struct{}

func (s Serializer) SerializeTodo(todoModel *domain.TodoModel) Todo {
	return Todo{
		ID:          todoModel.ID,
		Title:       todoModel.Title,
		Description: todoModel.Description,
		CreatedAt:   todoModel.CreatedAt,
	}
}

func (s Serializer) SerializeTodos(todos []domain.TodoModel) []Todo {
	var serialized []Todo
	for _, todo := range todos {
		serialized = append(serialized, s.SerializeTodo(&todo))
	}
	return serialized
}
