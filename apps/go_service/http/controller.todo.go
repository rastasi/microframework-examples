package http

import (
	"encoding/json"
	"net/http"

	"go_service/domain"
	"go_service/lib/http_utils"
)

type TodoControllerInterface interface {
	Index(w http.ResponseWriter, r *http.Request)
	Show(w http.ResponseWriter, r *http.Request)
	Create(w http.ResponseWriter, r *http.Request)
	Update(w http.ResponseWriter, r *http.Request)
	Destroy(w http.ResponseWriter, r *http.Request)
}

type TodoController struct {
	TodoService domain.TodoServiceInterface
}

func (c TodoController) Index(w http.ResponseWriter, r *http.Request) {
	todos := c.TodoService.All()
	http_utils.RespondWithJSON(w, http.StatusOK, Serializer{}.SerializeTodos(*todos))
}

func (c TodoController) Show(w http.ResponseWriter, r *http.Request) {
	id, _ := http_utils.GetParamUUID(r, "id")
	todo := c.TodoService.Get(id)
	http_utils.RespondWithJSON(w, http.StatusOK, Serializer{}.SerializeTodo(todo))
}

func (c TodoController) Create(w http.ResponseWriter, r *http.Request) {
	var todo domain.TodoModel
	json.NewDecoder(r.Body).Decode(&todo)
	todo_ := c.TodoService.Create(&todo)
	http_utils.RespondWithJSON(w, http.StatusOK, Serializer{}.SerializeTodo(todo_))
}

func (c TodoController) Update(w http.ResponseWriter, r *http.Request) {
	id, _ := http_utils.GetParamUUID(r, "id")
	var todo domain.TodoModel
	json.NewDecoder(r.Body).Decode(&todo)
	todo_ := c.TodoService.Update(id, &todo)
	http_utils.RespondWithJSON(w, http.StatusOK, Serializer{}.SerializeTodo(todo_))
}

func (c TodoController) Destroy(w http.ResponseWriter, r *http.Request) {
	var id, _ = http_utils.GetParamUUID(r, "id")
	c.TodoService.Destroy(id)
	w.WriteHeader(http.StatusNoContent)
}
