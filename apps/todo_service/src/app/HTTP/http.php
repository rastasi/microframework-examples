<?php

use App\HTTP\Controllers\TodoController;
use App\Domain\Services\TodoService;
use App\Domain\Repositories\TodoRepository;
use App\HTTP\Middlewares\LoggerMiddleware;
use App\Lib\HttpMethod;
use App\Lib\HttpServer;

require __DIR__ . '/../../../vendor/autoload.php';
require __DIR__ . '../../../lib/database.php';

$todoController = new TodoController(
    todoService: new TodoService(
        todoRepository: new TodoRepository()
    )
);

$server = new HttpServer();

$server->addMiddleware('/todo', LoggerMiddleware::class);

$server->addRoute(HttpMethod::GET, '/todo', [$todoController, 'index']);
$server->addRoute(HttpMethod::GET, '/todo/{todoId}', [$todoController, 'show']);
$server->addRoute(HttpMethod::POST, '/todo', [$todoController, 'create']);
$server->addRoute(HttpMethod::PUT, '/todo/{todoId}', [$todoController, 'update']);
$server->addRoute(HttpMethod::DELETE, '/todo/{todoId}', [$todoController, 'destroy']);

$server->run();
