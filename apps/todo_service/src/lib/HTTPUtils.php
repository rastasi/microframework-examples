<?php

namespace App\Lib;


class HTTPUtils
{
    static public function getJsonPayload(&$request)
    {
        return json_decode($request->getBody(), true);
    }

    static public function jsonResponse(&$response, int $status,  $body)
    {
        $response->getBody()->write(json_encode($body));
        $response = $response->withStatus($status);
        $response = $response->withHeader("Content-type", "application/json");
        return $response;
    }

    static public function textResponse(&$response, int $status,  $body)
    {
        $response->getBody()->write($body);
        $response = $response->withStatus($status);
        $response = $response->withHeader("Content-type", "plain/text");
        return $response;
    }
}
