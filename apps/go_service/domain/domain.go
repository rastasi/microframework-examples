package domain

import (
	"go_service/lib/mysql_utils"
)

type Domain struct {
	TodoService TodoService
}

func NewDomain() Domain {
	DB := mysql_utils.Init()
	MigrateGoDatabase(DB)
	return Domain{
		TodoService: TodoService{
			TodoRepository: TodoRepository{
				DB: DB,
			},
		},
	}
}
