@extends('layouts.basic')
@section('content')

    <div>
            <a class="btn btn-success" href="{{route('list')}}">List of products</a>
            <a class="btn btn-success" href="{{route('create')}}">Add a new product</a>
            <a class="btn btn-success" href="{{route('manufacturer_create')}}">New manufacturer</a>
            <a class="btn btn-success" href="{{route('manufacturer_list')}}">Manufacturers</a>
            <a class="btn btn-success" href="{{route('products_import')}}">Import products by excel</a>
            <a class="btn btn-success" href="{{route('categories')}}">Categories</a>
            <a class="btn btn-warning" href="{{route('manage')}}">Download list of products</a>
    </div>

@endsection

