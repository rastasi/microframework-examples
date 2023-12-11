package mqtt_utils

type MQTTClientInterface interface {
	Connect()
	Publish(subject string, data []byte) error
	Subscribe(subject string, handler func(data []byte)) error
}
