@extends('layouts.basic')
@section('content')

    <div class="col-md-12 text-center">
        <a class="btn btn-primary" href="{{route('main')}}">Main page</a>
    </div>

    @if (count($manufacturers) == 0)
        <h3 class="text-center">no manufacturers</h3>
    @else
        <h3 class="text-center">Table of manufacturers</h3>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Country</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($manufacturers as $manufacturer)
            <tr>
                <th>
                    {{$manufacturer->id}}
                </th>
                <td>
                    {{$manufacturer->name}}
                </td>
                <td>
                    {{$manufacturer->country}}
                </td>
                <td>
                    <a href="{{route('manufacturer_edit', ['manufacturer_id' => $manufacturer->id])}}" class="btn btn-warning">Edit</a>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
    {{$manufacturers->links()}}

@endsection

