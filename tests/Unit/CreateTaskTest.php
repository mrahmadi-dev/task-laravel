<?php

namespace Tests\Unit;

use App\Models\Task;
use PHPUnit\Framework\TestCase;

class CreateTaskTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $task = Task::factory(3);
    }
}
