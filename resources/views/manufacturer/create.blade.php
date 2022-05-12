@extends('layouts.basic')
@include('sections.mainnav')
@section('content')

    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header bg-dark-grey" align="center">
                        <h3>Add manufacturer</h3>
                    </div>
                    <div class="card-body bg-grey">
                        <form action="{{ route("manufacturer_store") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mt-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-7">
                                    <input name="name" id="name" class="form-control" type="text"
                                           placeholder="name of manufacturer"/>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                                <div class="col-md-7">
                                    <input id="country" class="form-control" type="text" name="country"
                                           placeholder="country"/>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                                <div class="col-md-7">
                                    <input id="image" name="image" type="file" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group row mt-3">
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

