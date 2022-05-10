@extends('layouts.basic')
@include('sections.mainnav')
@section('content')

        <h3 class="text-center">Table</h3>
         <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
            <th scope="col">Statement</th>
            <th scope="col">Amount</th>
            <th scope="col">Price</th>
            <th scope="col">Manufacturer</th>
            <th scope="col">Category</th>
            <th scope="col">Image</th>

            @auth()
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            @endauth

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
                    <a href="{{route('list', ["manufacturer_id" => $product->manufacturer_id])}}" style=" text-decoration: none;  color: inherit;">
                        <h6 class="">{{$product->manufacturer['name']}}</h6>
                    </a>
                </td>
                <td>
                    <a href="{{route('main', ["category_id" => $product->category_id])}}" style=" text-decoration: none;  color: inherit;">
                        <h6 class="" >{{$product->category['name']}}</h6>
                    </a>
                </td>
                <td>

                    @if($product->image)
                        <img src="{{asset('storage/' . $product->image)}}" style="width:50px; height:50px" class="img-fluid rounded-start img-article" alt="">
                    @else
                        <img src="{{asset('storage/images/default.jpg')}}" style="width:50px; height:50px" class="img-fluid rounded-start img-article" alt="...">
                    @endif

                </td>

                @auth()

                <td>
                    <a href="{{route('edit', ['product_id' => $product->id])}}" class="btn btn-warning btn-clr">Edit</a>
                </td>
                <td>
                    <form action="{{route('delete', ['product_id' => $product->id]) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" class="form-control" name="id" value="{{$product->id}}" hidden>
                        <button type="submit" id="delete-task-{{ $product->id }}" class="btn btn-danger btn-sm" onclick="if( ! confirm('fdsfdsf')){return false;}">
                            <i class="fa fa-btn fa-trash">Delete</i>
                        </button>
                    </form>
                </td>

                @endauth

            </tr>

        @endforeach

        </tbody>
    </table>

        <div class="row mt-3">
            <div class="container text-center" >
                {{$products->links()}}
            </div>
        </div>

@endsection

