<?php

namespace App\Services\Task;

use App\Dtos\Pagination\Pagination;
use App\Dtos\Task\TaskCreateDto;
use App\Dtos\Task\TaskIndexDto;
use App\Dtos\Task\TaskDto;
use App\Enum\TaskStatus;
use App\Models\Task;

class TaskUpdateServiceConcrete implements TaskUpdateServiceInterface
{
    public function index(Task $task, TaskCreateDto $taskCreateDto):bool
    {
//        dd($taskCreateDto);
        $datetime = new \DateTime();
        if (isset($taskCreateDto->status)) {
            $task->status = $taskCreateDto->status;
            $task->status_modified_at = $taskCreateDto->status_modified_at ?? $datetime->format('Y-m-d H:i:s');
        }else{
            $datetime = new \DateTime();
            $task->status = TaskStatus::PENDING->value;
            $task->status_modified_at = $datetime->format('Y-m-d H:i:s');
        }
        $task->title = $taskCreateDto->title ?? $task->title;
        $task->description = $taskCreateDto->description ?? $task->description;
        $task->save();
        return true;
    }
}
