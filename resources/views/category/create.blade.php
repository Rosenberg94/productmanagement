@extends('layouts.basic')
@section('content')
    <div class="container">
        <h2>create category</h2>
        <form action="{{ route("category_create") }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Parent id</label>
                <input type="text" class="form-control" id="parent_id" name="parent_id" placeholder="parent_id">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="category name">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Create</button>
            </div>

        </form>

    </div>



@endsection
