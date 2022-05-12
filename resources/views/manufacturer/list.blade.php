@extends('layouts.basic')
@include('sections.mainnav')
@section('content')

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
            <th scope="col">Photo</th>
            <th scope="col">Products</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($manufacturers as $manufacturer)
            <tr>
                <th>
                    <h5>
                        {{$manufacturer->id}}
                    </h5>
                </th>
                <td>
                    <h4>
                        {{$manufacturer->name}}
                    </h4>
                </td>
                <td>
                    <h5>
                        {{$manufacturer->country}}
                    </h5>
                </td>
                <td>
                    @if($manufacturer->image)
                        <img src="{{asset('storage/' . $manufacturer->image)}}" style="width:50px; height:50px" alt="">
                    @endif
                </td>
                <td>
                    <a href="{{route('manufacturer_products', ["id" => $manufacturer->id])}}" class="btn btn-success btn-sm">All manufacturer products</a>
                </td>
                <td>
                    <a href="{{route('manufacturer_edit', ['manufacturer_id' => $manufacturer->id])}}" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
    {{$manufacturers->links()}}

@endsection

