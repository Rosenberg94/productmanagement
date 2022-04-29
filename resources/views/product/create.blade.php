@extends('layouts.basic')
@section('content')

    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header" align="center">
                        <h3>Add product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("store") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-7">
                                    <input name="name" id="name" class="form-control" type="text"
                                           placeholder="name of product"/>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">Code</label>
                                <div class="col-md-7">
                                    <input id="code" class="form-control" type="text" name="code"
                                           placeholder="code"/>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="statement" class="col-md-4 col-form-label text-md-right">Pcs or kg</label>
                                <div class="col-md-7">
                                    <select id="statement" class="form-control" name="statement"  aria-label="Default select example">
                                        <option value="0">pcs</option>
                                        <option value="1">kg</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="amount" class="col-md-4 col-form-label text-md-right">Amount</label>
                                <div class="col-md-7">
                                    <input id="amount" class="form-control" type="text" name="amount"
                                           placeholder="amount"/>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>
                                <div class="col-md-7">
                                    <input id="price" class="form-control" type="text" name="price" placeholder="price"
                                           required/>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="manufacturer_id" class="col-md-4 col-form-label text-md-right">manufacturer_id</label>
                                <div class="col-md-7">
                                    <select class="form-control" id="manufacturer_id" name="manufacturer_id">
                                        @foreach($manufacturers as $manufacturer)
                                            <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                                <div class="col-md-7">
                                    <input id="image" name="image" type="file" class="form-control" >
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-md-7">
                                    <button class="btn btn-primary" type="submit">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
