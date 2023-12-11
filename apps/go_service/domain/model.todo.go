package domain

import (
	"time"

	"github.com/google/uuid"
	"gorm.io/gorm"
)

type TodoModel struct {
	ID          uuid.UUID `gorm:"type:char(36);primary_key;"`
	Title       string    `gorm:"type:varchar(100); not null;"`
	Description string    `gorm:"type:varchar(100); not null;"`
	CreatedAt   time.Time
	UpdatedAt   time.Time
	DeletedAt   *time.Time `sql:"index"`
}

func (todo TodoModel) TableName() string {
	return "todos"
}

func (record *TodoModel) BeforeCreate(tx *gorm.DB) (err error) {
	record.ID = uuid.New()
	return
}
