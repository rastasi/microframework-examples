<?php

namespace App\HTTP\Controllers;

use App\Domain\DTOs\TodoDTO;
use App\Domain\Services\TodoService;
use App\Lib\HTTPUtils;
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
        return HTTPUtils::jsonResponse($response, 201, $todos);
    }

    public function show(Request $request, Response $response, array $args)
    {
        $todo = $this->todoService->get($args['todoId']);
        return HTTPUtils::jsonResponse($response, 200, $todo);;
    }

    public function create(Request $request, Response $response, array $args)
    {
        $payload = $request->getParsedBody();
        $todo = $this->todoService->create(new TodoDTO(
            title: $payload["title"],
            description: $payload["description"],
        ));
        return HTTPUtils::jsonResponse($response, 201, $todo);
    }

    public function update(Request $request, Response $response, array $args)
    {
        $payload = $request->getParsedBody();
        $todo = $this->todoService->update($args['todoId'], new TodoDTO(
            title: $payload["title"],
            description: $payload["description"],
        ));
        return HTTPUtils::jsonResponse($response, 200, $todo);;
    }

    public function destroy(Request $request, Response $response, array $args)
    {
        $this->todoService->destroy($args['todoId']);
        return $response->withStatus(204)->getBody()->write("No content");
    }
}
