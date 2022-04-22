@extends('layouts.basic')
@section('content')

    <div class="form-group row">
        <div class="col-md-2 text-center">
            <a class="btn btn-success" href="{{route('list')}}">List of products</a>
        </div>
        <div class="col-md-2 text-center">
            <a class="btn btn-success" href="{{route('create')}}">Add a new product</a>
        </div>
        <div class="col-md-3 text-center">
            <a class="btn btn-success" href="{{route('manufacturer_create')}}">Add new manufacturer</a>
        </div>
        <div class="col-md-3 text-center">
            <a class="btn btn-success" href="{{route('manufacturer_list')}}">Manufacturers</a>
        </div>
        <div class="col-md-2 text-center">
            <a class="btn btn-success" href="{{route('products_import')}}">Import by excel</a>
        </div>
    </div>

@endsection

