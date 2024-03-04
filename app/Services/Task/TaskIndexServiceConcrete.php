<?php

namespace App\Services\Task;

use App\Dtos\Pagination\Pagination;
use App\Dtos\Task\TaskIndexDto;
use App\Dtos\Task\TaskDto;
use App\Enum\TaskStatus;
use App\Models\Task;

class TaskIndexServiceConcrete implements TaskIndexServiceInterface
{
    public function index(TaskIndexDto $taskIndexDto): Pagination
    {
        $filter = $taskIndexDto->filter;

        if ($filter == TaskStatus::PENDING->value){
            $tasks = Task::filterPendingTasks()->paginate(config('constants.pagination_num'));
        }else if ($filter == TaskStatus::COMPLETED->value){
            $tasks = Task::filterCompletedTasks()->paginate(config('constants.pagination_num'));
        }else{
            $tasks = Task::filterTasks()->paginate(config('constants.pagination_num'));
        }

        $taskIndexDtos = $tasks->map(function ($task){
            return TaskDto::create($task);
        })->toArray();

        return Pagination::fromModelPaginatorAndData($tasks->links()->paginator,$taskIndexDtos);
    }
}
