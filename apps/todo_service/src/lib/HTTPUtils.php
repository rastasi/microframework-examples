<?php

namespace App\Lib;


class HTTPUtils
{
    static public function jsonResponse(&$response, int $status,  $body)
    {
        $response->getBody()->write(json_encode($body));
        $response = $response->withStatus($status);
        $response = $response->withHeader("Content-type", "application/json");
        return $response;
    }
}
