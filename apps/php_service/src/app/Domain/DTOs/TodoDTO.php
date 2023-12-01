<?php

namespace App\Domain\DTOs;


class TodoDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
    ) {}
}
