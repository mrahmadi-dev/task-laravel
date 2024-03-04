<?php

namespace Tests\Feature;

use App\Dtos\Task\TaskCreateDto;
use App\Enum\TaskStatus;
use App\Services\Task\TaskCreateServiceConcrete;
use Tests\TestCase;

class TaskCreateTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create(): void
    {
        $taskCreateServiceConcrete = new TaskCreateServiceConcrete();
        $taskCreateDto = TaskCreateDto::fromArray([
            'title' => '005',
            'description' => '006',
            'status' => TaskStatus::PENDING->value,
            'status_modified_at' => null
        ]);
        $taskCreateService = $taskCreateServiceConcrete->index($taskCreateDto);
        $this->assertTrue($taskCreateService);
    }
}
