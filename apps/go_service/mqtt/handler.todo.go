package mqtt

import (
	"encoding/json"
	"fmt"
	"go_service/domain"
)

type TodoHandlerInterface interface {
	Create([]byte)
}

type TodoHandler struct {
	TodoService domain.TodoServiceInterface
}

func (h TodoHandler) Create(data []byte) {
	todo := domain.TodoModel{}
	json.Unmarshal(data, &todo)
	fmt.Println(todo)
	h.TodoService.Create(&todo)
}
