<?php

namespace App\Services\Task;

use App\Dtos\Task\TaskCreateDto;
use App\Dtos\Task\TaskIndexDto;

interface TaskCreateServiceInterface
{
    public function index(TaskCreateDto $taskCreateDto);
}
