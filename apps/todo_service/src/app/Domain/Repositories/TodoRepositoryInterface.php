<?php

namespace App\Domain\Repositories;

use App\Domain\DTOs\TodoDTO;
use App\Domain\Models\Todo;

interface TodoRepositoryInterface
{
    public function getAll();
    public function get(int $id): Todo;
    public function create(TodoDTO $todoDTO): Todo;
    public function update(int $id, TodoDTO $todoDTO): Todo;
    public function destroy(int $id);
}
