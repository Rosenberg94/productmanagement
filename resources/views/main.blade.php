@extends('layouts.basic')
@section('content')

    <div>
        <a class="btn btn-info" href="{{route('list')}}">All products</a>
        <a class="btn btn-info" href="{{route('manufacturer_list')}}">Manufacturers</a>
        <a class="btn btn-info" href="{{route('categories')}}">Categories</a>
        <a class="btn btn-success" href="{{route('create')}}">Add a new product</a>
        <a class="btn btn-success" href="{{route('manufacturer_create')}}">New manufacturer</a>
        <a class="btn btn-warning" href="{{route('products_import')}}">Import products by excel</a>
        <a class="btn btn-warning" href="{{route('manage')}}">Download all products</a>
    </div>

@endsection

