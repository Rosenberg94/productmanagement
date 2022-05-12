@extends('layouts.basic')
@include('sections.mainnav')
@section('content')

    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header" align="center">
                        <h3>Edit category</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("category_edit") }}" method="post">

                            @csrf
                            <input name="id" type="text" value="{{$category->id}}" hidden />

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Category</label>
                                <div class="col-md-7">
                                    <input name="name" id="name" class="form-control" type="text"
                                           value="{{$category->name}}"/>
                                </div>
                            </div>
                            <br>
                            <div class="row" >
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-7">
                                    <button class="btn btn-primary" type="submit">Edit category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

