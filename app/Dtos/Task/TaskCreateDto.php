<?php

namespace App\Dtos\Task;

use Illuminate\Http\Request;

class TaskCreateDto
{
    private function __construct(
        public readonly ?string $title,
        public readonly ?string $description,
        public readonly ?string $status,
        public readonly ?string $status_modified_at,
    )
    {
    }

    public static function create(Request $request): TaskCreateDto
    {
        return new self(
            $request->get('title'),
            $request->get('description'),
            $request->get('status'),
            $request->get('status_modified_at')
        );
    }
}
