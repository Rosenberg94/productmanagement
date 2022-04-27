@extends('layouts.basic')
@section('content')
    <div class="container text-center">
        <div>
            <a class="btn btn-success" href="{{route('products_export_excel')}}">Create file</a>
        </div>
    </div>
@endsection
