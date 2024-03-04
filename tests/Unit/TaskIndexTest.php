<?php

namespace Tests\Unit;

use App\Enum\TaskStatus;
use App\Models\Task;
use App\Models\User;
use Tests\TestCase;

class TaskIndexTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
//        $this->assertIsInt(1);
        $user = User::findOrFail(21);
        $response = $this->actingAs($user)->get('/task');
        $response->assertStatus(200);
//        $this->get('/');
//        $data = [
//            'title' => "unit test",
//            'description' => "unit test desc",
//            'status' => TaskStatus::PENDING->value,
//        ];
//        $response = $this->json('POST', '/task/create',$data);
//        $response->assertStatus(401);
//        $response->assertJson(['message' => "Unauthenticated."]);
    }


}


