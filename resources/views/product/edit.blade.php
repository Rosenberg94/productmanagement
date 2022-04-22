@extends('layouts.basic')
@section('content')

    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header" align="center">
                        <h3>Edit product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("edit") }}" method="post">
                            @csrf
                            <input name="id" type="text" value="{{$product->id}}" hidden />
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-7">
                                    <input name="name" id="name" class="form-control" type="text"
                                           value="{{$product->name}}"/>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">Code</label>
                                <div class="col-md-7">
                                    <input id="code" class="form-control" type="text" name="code"
                                           value="{{$product->code}}"/>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="statement" class="col-md-4 col-form-label text-md-right">Pcs or kg</label>
                                <div class="col-md-7">
                                    <select id="statement" class="form-control" name="statement"  aria-label="Default select example">
                                        <option value="{{$product->statement}}" selected >
                                            @if($product->statement)
                                                kg
                                            @else
                                                pcs
                                            @endif
                                        </option>
                                            @if($product->statement)
                                                <option value="0">pcs</option>
                                            @else
                                                <option value="1`">kg</option>
                                            @endif
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="amount" class="col-md-4 col-form-label text-md-right">Amount</label>
                                <div class="col-md-7">
                                    <input id="amount" class="form-control" type="text" name="amount" value="{{$product->amount}}"
                                           required/>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>
                                <div class="col-md-7">
                                    <input id="price" class="form-control" type="text" name="price" value="{{$product->price}}"
                                           required/>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="manufacturer_id" class="col-md-4 col-form-label text-md-right">manufacturer_id</label>
                                <div class="col-md-7">
                                    <input id="manufacturer_id" class="form-control" type="text" name="manufacturer_id" value="{{$product->manufacturer_id}}"
                                           required/>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-md-7">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
