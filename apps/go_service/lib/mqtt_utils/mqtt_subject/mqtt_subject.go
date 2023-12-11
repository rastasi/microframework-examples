package mqtt_subject

// [sender]_[resource]_[action]

const (
	ProductProductUpdate   = "product.product.update.*"
	ProductProductShow     = "product.product.show.*"
	ProductTodoCreate      = "product.todo.create.*"
	ProductServiceUpdate   = "product_service.product.update.*"
	UserServiceUserCreate  = "user_service.user.create.*"
	UserServiceUserUpdate  = "user_service.user.update.*"
	UserServiceUserDestroy = "user_service.user.destroy.*"
)
