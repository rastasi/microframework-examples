package mqtt_data

import "github.com/google/uuid"

type ProductServiceUpdateData struct {
	FanSpeed          int `json:"fanSpeed"`
	StepperMotorRpm   int `json:"stepperMotorRpm"`
	TargetTemperature int `json:"targetTemperature"`
}

type ProductServiceShowData struct {
	ProductID uuid.UUID `json:"productId"`
}
