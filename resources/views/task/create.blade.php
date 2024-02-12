@extends('layouts.app')

@section('body')
    <form class="row g-3" action="{{ route('save') }}">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Title</label>
            <input type="email" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Description</label>
            <input type="password" class="form-control" id="inputPassword4">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
