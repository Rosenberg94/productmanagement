@extends('layouts.basic')
@section('content')
    <div class="container">
        <h2 class="text-center" >Categories list</h2>
        <div class="row">
            <div class="col-md-6 text-center">
                <a class="btn btn-success"  href="{{route('category_create_form')}}">Create category</a>
            </div>
            <div class="col-md-6 text-center">
                <a class="btn btn-primary" href="{{route('main')}}">Main page</a>
            </div>
        </div>
        <br>
        @foreach($categories as $category)
            <div class="col-md-12">
                <div class="card" style="">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <h4 class="text-center">{{$category->name}}</h4>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-1">
                                <a href="{{route('category_edit_form', ["id" => $category->id])}}" class="btn btn-warning">Edit</a>
                            </div>
                            <div class="col-md-1">
                                <form action="{{route('category_delete') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="text" class="form-control" name="id" value="{{$category->id}}" hidden>
                                    <button type="submit" id="delete-task-{{ $category->id }}" class="btn btn-danger" onclick="if( ! confirm('Are U really want to delete category')){return false;}">
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
