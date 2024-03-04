<?php

namespace App\Services\Task;

use App\Dtos\Pagination\Pagination;
use App\Dtos\Task\TaskCreateDto;
use App\Dtos\Task\TaskIndexDto;
use App\Dtos\Task\TaskDto;
use App\Enum\TaskStatus;
use App\Models\Task;

class TaskCreateServiceConcrete implements TaskCreateServiceInterface
{
    public function index(TaskCreateDto $taskCreateDto):bool
    {
        Task::create([
            'title' => $taskCreateDto->title,
            'description' => $taskCreateDto->description
        ]);

        return true;
    }
}
