package mqtt_utils

import (
	"encoding/json"
	"strings"

	"github.com/google/uuid"
)

func Stringify(data any) []byte {
	str, _ := json.Marshal(data)
	return str
}

func AttachIDToSubject(subject string, id uuid.UUID) string {
	return strings.Replace(subject, "*", id.String(), 1)
}
