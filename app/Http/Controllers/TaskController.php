<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $date_condition = Carbon::now()->subDays(config('constants.latest_days_records'))->toDateTimeString();
        $filter = $request->query('filter');
        if ($filter == 'PENDING') {
            $tasks = DB::table('tasks')->where('is_completed',$filter)
                ->orderByDesc('created_at')->paginate(config('constants.pagination_num'));
        }else if ($filter == 'COMPLETED'){
            $tasks = DB::table('tasks')->where('is_completed',$filter)
                ->where('created_at','>=',$date_condition)
                ->orderByDesc('created_at')->paginate(config('constants.pagination_num'));
        }else{
            $tasks = DB::table('tasks')->orderByDesc('created_at')
                ->where('is_completed','PENDING')
                ->orWhere(function ($query) {
                    $query->where('is_completed','COMPLETED')
                        ->where('created_at','>=',Carbon::now()->subDays(config('constants.latest_days_records'))->toDateTimeString());
                })
                ->paginate(config('constants.pagination_num'));
        }
        return view('task.index',[
            'tasks' => $tasks,
            'filter' => $filter,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $_data = $request->all();
        Task::create([
            'title' => $_data['title'],
            'description' => $_data['description']
        ]);
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('task.edit',[
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $request, Task $task)
    {
        $_data = $request->all();

        $task->title = $_data['title'];
        $task->description = $_data['description'];
        $task->save();
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
