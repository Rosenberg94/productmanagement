@extends('layouts.basic')
@include('sections.mainnav')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 bg-grey mt-2">
            <h2 class="text-center">Categories list</h2>
            @foreach($categories as $category)
                <div class="dropdown">
                    <button class="btn btn-clr dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <h4 class="text-center">
                            {{$category->name}}
                        </h4>
                    </button>
                    <ul class="dropdown-menu text-center body-clr" aria-labelledby="navbarDropdown">
                        @auth()
                        <li class="text-center">
                            <a href="{{route('category_edit', ["id" => $category->id])}}" class="btn btn-warning btn-sm text-center">Edit</a>
                        </li>
                        <li class="text-center mt-2">
                            <form action="{{route('category_delete') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="text" class="" name="id" value="{{$category->id}}" hidden>
                                <button type="submit" id="delete-task-{{ $category->id }}" class="btn btn-danger btn-sm" onclick="if( ! confirm('????')){return false;}">
                                    <i class="fa fa-btn fa-trash">Delete</i>
                                </button>
                            </form>
                        </li>
                        @endauth
                    </ul>
                </div>
                <br>
            @endforeach
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
