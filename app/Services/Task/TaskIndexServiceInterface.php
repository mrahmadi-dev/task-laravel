<?php

namespace App\Services\Task;

use App\Dtos\Task\TaskIndexDto;

interface TaskIndexServiceInterface
{
    public function index(TaskIndexDto $taskIndexDto);
}
