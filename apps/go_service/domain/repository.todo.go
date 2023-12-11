package domain

import (
	"github.com/google/uuid"
	"gorm.io/gorm"
)

type TodoRepositoryInterface interface {
	All() *[]TodoModel
	Get(id uuid.UUID) *TodoModel
	Create(todo *TodoModel) *TodoModel
	Update(id uuid.UUID, todo *TodoModel) *TodoModel
	Destroy(id uuid.UUID)
}

type TodoRepository struct {
	DB *gorm.DB
}

func (r TodoRepository) FindByID(id uuid.UUID) *TodoModel {
	var todo TodoModel
	r.DB.Where("id", id).Find(&todo)
	return &todo
}

func (r TodoRepository) All() *[]TodoModel {
	var todos []TodoModel
	r.DB.Find(&todos)
	return &todos
}

func (r TodoRepository) Get(id uuid.UUID) *TodoModel {
	return r.FindByID((id))
}

func (r TodoRepository) Create(todo *TodoModel) *TodoModel {
	r.DB.Create(&todo)
	return todo
}

func (r TodoRepository) Update(id uuid.UUID, todo *TodoModel) *TodoModel {
	r.DB.Model(TodoModel{ID: id}).Updates(&todo)
	return r.FindByID((id))
}

func (r TodoRepository) Destroy(id uuid.UUID) {
	r.DB.Delete(r.FindByID(id))
}
