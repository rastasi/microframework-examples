package http

import (
	"go_service/domain"
	"go_service/lib/http_utils"
)

func StartHttpServer(domain domain.Domain) {
	authorization_middleware_context := http_utils.AuthorizationMiddlewareContext{}

	router := Router{
		TodoController: TodoController{
			TodoService: domain.TodoService,
		},
	}.Init()

	http_utils.StartGenericHTTPServer(http_utils.StartGenericHTTPServerContext{
		Router:                         router,
		AuthorizationMiddlewareContext: authorization_middleware_context,
	})
}
