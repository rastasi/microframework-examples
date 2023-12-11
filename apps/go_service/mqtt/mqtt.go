package mqtt

import (
	"go_service/domain"
	"go_service/lib/mqtt_utils"
	"go_service/lib/mqtt_utils/mqtt_subject"
)

func StartMqttClient(domain domain.Domain) {
	client := GoServiceMqttClient{
		Client: &mqtt_utils.NATSClient{},
		TodoHandler: TodoHandler{
			TodoService: domain.TodoService,
		},
	}
	client.Start()
}

type GoServiceMqttClient struct {
	Client      mqtt_utils.MQTTClientInterface
	TodoHandler TodoHandlerInterface
}

func (c GoServiceMqttClient) Start() {
	c.Client.Connect()
	c.Client.Subscribe(mqtt_subject.ProductTodoCreate, c.TodoHandler.Create)
}
