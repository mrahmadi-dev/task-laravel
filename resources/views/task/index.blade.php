@extends('layouts.app')

@section('body')
    <a href="{{ route('task.create') }}" class="btn btn-primary"> New Task</a>
    <div class="row mt-2">
        <div class="col-4">
            <select class="form-control" id="filter">
                <option {{ !isset($filter) ? 'selected' : ''  }} value="">all</option>
                <option {{ $filter == 'PENDING' ? 'selected' : ''  }} value="PENDING">pending</option>
                <option {{ $filter == 'COMPLETED' ? 'selected' : ''  }} value="COMPLETED">completed</option>
            </select>
        </div>
    </div>
    <table class="table mt-2">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">create date</th>
            <th scope="col">status</th>
            <th scope="col">status modified at</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks->data as $key => $task)

        <tr>
            <th scope="row">{{ $key +1  }}</th>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description  }}</td>
            <td>{{ $task->created_at  }}</td>
            <td>
                {{ $task->status }}
            </td>
            <td>
                {{ $task->status_modified_at }}
            </td>
            <td>
                <a class="d-inline-block" href="{{ route('task.show',['task'=> $task->id]) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                    </svg>
                </a>

                <a class="d-inline-block" href="{{ route('task.edit',['task'=> $task->id]) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                </a>

                @if($task->status == 'PENDING')
                    <form action="{{ route('task.update',['task'=> $task->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $task->id }}">
                        <input type="hidden" name="status" value="COMPLETED">
                        <button type="submit" style="background: white;border: none;" class="delete-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z"/>
                                <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0"/>
                            </svg>
                        </button>

{{--                    <button type="submit" style="background: white;border: none;" class="delete-btn" onclick="handleDeleteTask({{ $task->id }})">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">--}}
{{--                            <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z"/>--}}
{{--                            <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0"/>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
                    </form>
                @endif
            </td>
        </tr>

        @endforeach
        </tbody>
    </table>

    @if($tasks->links)
        <nav class="mt-5">
            <ul class="pagination">
                @if ($tasks->meta->current_page == 1)
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $tasks->links->prev }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                @foreach ($tasks->meta->links as $page => $element)
                            @if ($page == ($tasks->meta->current_page - 1) )
                                <li class="page-item active" aria-current="page"><span class="page-link">{{ ++$page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $element }}">{{ ++$page }}</a></li>
                            @endif
                @endforeach
                @if ($tasks->links->next)
                    <li class="page-item">
                        <a class="page-link" href="{{ $tasks->links->next }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif

@endsection

@section('js')
<script>
    document.getElementById('filter').addEventListener('change',function () {
        let currentUrl = 'http://localhost:8000'
        let val = document.getElementById('filter').value
        if(val !== ""){
            window.location = currentUrl+'/task?filter='+val
        }else{
            window.location = currentUrl+'/task'
        }
    })

    {{--function handleDeleteTask(taskId) {--}}
    {{--    let formData = new FormData();--}}
    {{--    formData.append('status','COMPLETED')--}}
    {{--    formData.append('_token','{{ csrf_token() }}')--}}
    {{--    let xhttp = new XMLHttpRequest();--}}
    {{--    xhttp.onload = function() {--}}

    {{--    }--}}
    {{--    xhttp.open("PUT", "/task/"+taskId);--}}
    {{--    xhttp.send({});--}}
    {{--}--}}

</script>
@endsection
