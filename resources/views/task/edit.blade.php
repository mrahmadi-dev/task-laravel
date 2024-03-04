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
                <textarea class="form-control" id="inputDescription" name="description">{{ $task->description }}</textarea>
            </div>
        </div>

        <div class="col-12 mt-1">
            <div class="form-check">
                <input class="form-check-input" value="COMPLETED" name="status" type="checkbox" id="gridCheck" {{ $task->status == 'COMPLETED' ? 'checked' : '' }}>
                <label class="form-check-label" for="gridCheck">
                    Completed
                </label>
            </div>
        </div>
        <div id="datetimeWrapper" class="col-6 mt-1 position-relative mt-3" style="display: {{  $task->status == 'COMPLETED' ? 'block' : 'none' }}">
            <label for="inputTitle" class="form-label">completion time</label>
            <input type="text" class="form-control" id="datetimepicker" value="{{ $task->status_modified_at ?? $now  }}" name="status_modified_at">
        </div>

        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection

@section('js')
<script>
    $(function(){
        $("#gridCheck").click(function (){
            if($(this).prop('checked') == true) {
                $("#datetimeWrapper").show()
            }else {
                $("#datetimeWrapper").hide()
            }
        })
        $("#datetimepicker").flatpickr(
            {
                enableTime: true,
                dateFormat: "Y-m-d H:i:ss",
                time_24hr: true
            }
        )
    });
</script>
@endsection
