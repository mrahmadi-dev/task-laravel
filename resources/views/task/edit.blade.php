@extends('layouts.app')

@section('body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="g-3" action="{{ route('task.update',['task'=> $task]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $task->id }}">
        <div class="row">
            <div class="col-md-6">
                <label for="inputTitle" class="form-label">Title</label>
                <input type="text" class="form-control" id="inputTitle" value="{{ $task->title }}" name="title">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="inputDescription" class="form-label">Description</label>
                <textarea class="form-control" id="inputDescription" name="description">{{ $task->description  }}</textarea>
            </div>
        </div>

        <div class="col-12 mt-1">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Completed
                </label>
            </div>
        </div>

        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
