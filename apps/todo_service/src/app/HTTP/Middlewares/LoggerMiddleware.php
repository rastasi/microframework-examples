<?php

namespace App\HTTP\Middlewares;

use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Psr7\Response;

class LoggerMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler)
    {
        $response = $handler->handle($request);
        $existingContent = (string) $response->getBody();

        $response = new Response();
        $response->getBody()->write('BEFORE' . $existingContent);

        return $response;
    }
}
