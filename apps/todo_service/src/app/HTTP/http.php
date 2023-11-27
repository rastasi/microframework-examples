<?php

use App\HTTP\Controllers\TodoController;
use App\Domain\Services\TodoService;
use App\Domain\Repositories\TodoRepository;
use App\HTTP\Middlewares\LoggerMiddleware;
use App\Lib\HTTPMethod;
use App\Lib\HTTPServer;

require __DIR__ . '/../../../vendor/autoload.php';
require __DIR__ . '../../../lib/database.php';

$todoController = new TodoController(
    todoService: new TodoService(
        todoRepository: new TodoRepository()
    )
);

$server = new HTTPServer();

$server->addMiddleware('/todo', LoggerMiddleware::class);

$server->addRoute(HTTPMethod::GET, '/todo', [$todoController, 'index']);
$server->addRoute(HTTPMethod::GET, '/todo/{todoId}', [$todoController, 'show']);
$server->addRoute(HTTPMethod::POST, '/todo', [$todoController, 'create']);
$server->addRoute(HTTPMethod::PUT, '/todo/{todoId}', [$todoController, 'update']);
$server->addRoute(HTTPMethod::DELETE, '/todo/{todoId}', [$todoController, 'destroy']);


$server->run();
