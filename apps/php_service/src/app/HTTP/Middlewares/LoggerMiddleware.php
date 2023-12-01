<?php

namespace App\HTTP\Middlewares;

use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Message\ServerRequestInterface as Request;

class LoggerMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler)
    {
        $message = "Custom log";
        fwrite(fopen('php://stdout', 'wb'), $message . PHP_EOL);
        return $handler->handle($request);;
    }
}
