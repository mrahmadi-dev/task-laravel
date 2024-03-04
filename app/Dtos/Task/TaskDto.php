<?php

namespace App\Dtos\Task;

use App\Models\Task;

class TaskDto
{
    private function __construct(
        public readonly ?int $id,
        public readonly string $title,
        public readonly ?string $description,
        public readonly string $status,
        public readonly string $created_at,
        public readonly ?string $status_modified_at,
    )
    {
    }

    public static function create(Task $task): TaskDto
    {
        return new self(
            $task->id,
            $task->title,
            $task->description,
            $task->status,
            $task->created_at,
            $task->status_modified_at
        );
    }
}
