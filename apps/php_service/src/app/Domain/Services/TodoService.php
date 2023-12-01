<?php

namespace App\Domain\Services;

use App\Domain\DTOs\TodoDTO;
use App\Domain\Models\Todo;
use App\Domain\Repositories\TodoRepositoryInterface;

class TodoService
{
    protected TodoRepositoryInterface $todoRepository;

    function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    function getAll()
    {
        return $this->todoRepository->getAll();
    }

    function get(int $id): Todo
    {
        return $this->todoRepository->get($id);
    }

    function create(TodoDTO $todoDTO): Todo
    {
        return $this->todoRepository->create($todoDTO);
    }

    function update(int $id, TodoDTO $todoDTO): Todo
    {
        return $this->todoRepository->update($id, $todoDTO);
    }

    function destroy(int $id)
    {
        return $this->todoRepository->destroy($id);
    }
}
