<?php

namespace App\Domain\Repositories;

use App\Domain\DTOs\TodoDTO;
use App\Domain\Models\Todo;

class TodoRepository implements TodoRepositoryInterface
{

    public function getAll()
    {
        return Todo::all();
    }

    public function get(int $id): Todo
    {
        return Todo::find($id);
    }

    public function create(TodoDTO $todoDTO): Todo
    {
        $todo = new Todo();
        $todo->title = $todoDTO->title;
        $todo->description = $todoDTO->description;
        $todo->save();
        return $todo;
    }

    public function update(int $id, TodoDTO $todoDTO): Todo
    {
        $todo = $this->get($id);
        $todo->update([
            'title' => $todoDTO->title,
            'description' => $todoDTO->description
        ]);
        return $todo;
    }

    public function destroy(int $id)
    {
        Todo::destroy($id);
    }
}
