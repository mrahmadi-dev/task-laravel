<?php

namespace App\Services\Task;

use App\Dtos\Task\TaskCreateDto;
use App\Dtos\Task\TaskIndexDto;
use App\Models\Task;

interface TaskUpdateServiceInterface
{
    public function index(Task $task, TaskCreateDto $taskCreateDto);

}
