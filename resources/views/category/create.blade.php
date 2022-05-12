@extends('layouts.basic')
@include('sections.mainnav')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="container card bg-light-grey">
                <h2 class="text-center">Create category</h2>
                <form action="{{ route("category_create") }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Parent id</label>
                        <input type="text" class="form-control" id="parent" name="parent">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>



@endsection
