@extends('layouts.basic')
@section('content')

    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header" align="center">
                        <h3>Edit manufacturer</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("manufacturer_update") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input name="id" type="text" value="{{$manufacturer->id}}" hidden />
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-7">
                                    <input name="name" id="name" class="form-control" type="text"
                                           value="{{$manufacturer->name}}"/>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                                <div class="col-md-7">
                                    <input id="country" class="form-control" type="text" name="country"
                                           value="{{$manufacturer->country}}"/>
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
