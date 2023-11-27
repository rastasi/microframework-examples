<?php

namespace App\HTTP\Controllers;

use App\Domain\DTOs\TodoDTO;
use App\Domain\Services\TodoService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class TodoController
{
    private $todoService;

    public function __construct(TodoService $todoService) {
        $this->todoService = $todoService;
    }
    
    public function index(Request $request, Response $response, array $arg)
    {
        $todos = $this->todoService->getAll();
        $response->withStatus(200)->getBody()->write(json_encode($todos));
        return $response;
    }

    public function show(Request $request, Response $response, array $args)
    {
        $todo = $this->todoService->get($args['todoId']);
        $response->withStatus(200)->getBody()->write(json_encode($todo));
        return $response;
    }

    public function create(Request $request, Response $response, array $args)
    {
        $payload = $request->getParsedBody();
        $todo = $this->todoService->create(new TodoDTO(
            title: $payload["title"],
            description: $payload["description"],
        ));
        $response->withStatus(201)->getBody()->write(json_encode($todo));
        return $response;
    }

    public function update(Request $request, Response $response, array $args)
    {
        $payload = $request->getParsedBody();
        $todo = $this->todoService->update($args['todoId'], new TodoDTO(
            title: $payload["title"],
            description: $payload["description"],
        ));
        $response->withStatus(200)->getBody()->write(json_encode($todo));
        return $response;
    }

    public function destroy(Request $request, Response $response, array $args)
    {
        $this->todoService->destroy($args['todoId']);
        $response->withStatus(204)->getBody()->write("No content");
        return $response;
    }
}
