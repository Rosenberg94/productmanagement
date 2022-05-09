@extends('layouts.basic')
@include('sections.mainnav')
@section('content')

    <div class="col-md-12 text-center">
        <a class="btn btn-primary" href="{{route('main')}}">Main page</a>
    </div>

    @if (count($products) == 0)
        <h3 class="text-center">no products</h3>
    @else
        <h3 class="text-center">Table</h3>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
            <th scope="col">Statement</th>
            <th scope="col">Amount</th>
            <th scope="col">Price</th>
            <th scope="col">Manufacturer_id</th>
            <th scope="col">Image</th>
            <th scope="col">Edit</th>

        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th>
                    {{$product->id}}
                </th>
                <td>
                    {{$product->name}}
                </td>
                <td>
                    {{$product->code}}
                </td>
                <td>
                    @if($product->statement)
                        kg
                    @else
                        pcs
                    @endif
                </td>
                <td>
                    {{$product->amount}}
                </td>
                <td>
                    {{$product->price}}
                </td>
                <td>
                    {{$product->manufacturer_id}}
                </td>
                <td>
                    @if($product->image)
                        <img src="{{asset('storage/' . $product->image)}}" style="width:50px; height:50px" alt="">
                    @endif
                </td>
                <td>
                    <a href="{{route('edit', ['product_id' => $product->id])}}" class="btn btn-warning">Edit</a>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
    {{$products->links()}}

@endsection

