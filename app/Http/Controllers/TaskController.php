<?php

namespace App\Http\Controllers;

use App\Dtos\Task\TaskCreateDto;
use App\Dtos\Task\TaskDto;
use App\Dtos\Task\TaskIndexDto;
use App\Enum\TaskStatus;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Services\Task\TaskCreateServiceConcrete;
use App\Services\Task\TaskIndexServiceConcrete;
use App\Services\Task\TaskUpdateServiceConcrete;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, TaskIndexServiceConcrete $taskIndexServiceConcrete): View
    {
        $dtoObject = TaskIndexDto::create($request);
        $tasks = $taskIndexServiceConcrete->index($dtoObject);
        return view('task.index',[
            'tasks' => $tasks,
            'filter' => $dtoObject->filter,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request, TaskCreateServiceConcrete $taskCreateServiceConcrete): RedirectResponse
    {
        $taskCreateDto = TaskCreateDto::create($request);
        $taskCreateServiceConcrete->index($taskCreateDto);
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): View
    {
        return view('task.show',[
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        $datetime = new \DateTime();
        return view('task.edit',[
            'task' => $task,
            'now' => $datetime->format('Y-m-d hH:i:s')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task, TaskUpdateServiceConcrete $taskUpdateServiceConcrete): RedirectResponse
    {
        $taskCreateDto = TaskCreateDto::create($request);
        $taskUpdateServiceConcrete->index($task,$taskCreateDto);
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }

}
