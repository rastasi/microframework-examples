package mqtt_utils

import (
	"fmt"
	"os"

	"github.com/nats-io/nats.go"
)

type NATSClient struct {
	Conn *nats.Conn
}

func (c *NATSClient) Connect() {
	client, err := nats.Connect(os.Getenv("NATS_URI"))
	c.Conn = client
	printError(err)
	indicatorMessage(client.IsConnected())
}

func (c *NATSClient) Publish(subject string, data []byte) error {
	err := c.Conn.Publish(subject, data)
	return err
}

func (c *NATSClient) Subscribe(subject string, handler func([]byte)) error {
	_, err := c.Conn.Subscribe(subject, func(msg *nats.Msg) {
		handler(msg.Data)
	})
	printError(err)
	return err
}

func printError(err error) {
	if err != nil {
		fmt.Println(err)
	}
}

func indicatorMessage(connected bool) {
	if connected {
		fmt.Println("MQTT Client connected")
	} else {
		fmt.Println("MQTT Client NOT connected")
	}
}
