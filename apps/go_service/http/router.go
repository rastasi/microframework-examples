package http

import (
	"github.com/go-chi/chi/v5"
)

type Router struct {
	TodoController TodoControllerInterface
}

func (r Router) Init() *chi.Mux {
	router := chi.NewRouter()

	router.Get("/todo", r.TodoController.Index)
	router.Get("/todo/{id}", r.TodoController.Show)
	router.Post("/todo", r.TodoController.Create)
	router.Put("/todo/{id}", r.TodoController.Update)
	router.Delete("/todo/{id}", r.TodoController.Destroy)

	return router
}
