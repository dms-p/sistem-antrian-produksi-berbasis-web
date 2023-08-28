@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>Create New {{$title}}</h1>
        </div>
        <div class="col-sm-6 text-right">
            <!--a href="#" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Add New</!a-->
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <form action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <div class="row d-flex">
                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            <label for="name">Name customer</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror " value="{{old('name')}}" name="name" id="name" aria-describedby="helpId" autocomplete="off">
                            @error('name')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control @error('stock') is-invalid @enderror " value="{{old('stock')}}" name="stock" id="stock" aria-describedby="helpId" autocomplete="off">
                            @error('stock')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            <label for="exampleInputFile">Image <small class="text-muted">Dimension must be (1016px x 638px)</small></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" accept="images/*" class="custom-file-input @error('image') is-invalid @enderror " value="{{old('image')}}" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                            @error('image')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                @include('includes.components.btnSave')
            </div>
        </form>
    </div>
@endsection