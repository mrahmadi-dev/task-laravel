<?php

namespace App\Dtos\Task;


use Illuminate\Http\Request;

class TaskIndexDto
{
    private function __construct(
        public readonly ?string $filter,
    )
    {
    }

    public static function create(Request $request): TaskIndexDto
    {
        return new self(
            $request->query('filter')
        );
    }
}
