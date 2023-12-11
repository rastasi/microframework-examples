package main

import (
	"go_service/domain"
	"go_service/http"
	"go_service/mqtt"
)

func main() {
	domain := domain.NewDomain()
	mqtt.StartMqttClient(domain)
	http.StartHttpServer(domain)
}
