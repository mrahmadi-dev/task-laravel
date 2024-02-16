@extends('layouts.app')

@section('body')
    <div>
        <label style="font-weight: bold">Title: </label>
        <span>{{ $task->title }}</span>
    </div>
    <div class="mt-2">
        <label style="font-weight: bold">Description: </label>
        <span>{{ $task->description }}</span>
    </div>
    <div class="mt-2">
        <label style="font-weight: bold">Status: </label>
        <span>
            {{ $task->status }}
            @if($task->status_modified_at)
                ( {{ $task->status_modified_at }} )
            @endif
        </span>
    </div>
    <div class="mt-2">
        <label style="font-weight: bold">Created at: </label>
        <span>{{ $task->created_at }}</span>
    </div>
    <div class="mt-2">
        <label style="font-weight: bold">Updated at: </label>
        <span>{{ $task->updated_at }}</span>
    </div>
@endsection

