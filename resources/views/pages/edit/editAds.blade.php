@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>Edit {{$title}}</h1>
        </div>
        <div class="col-sm-6 text-right">
            <!--a href="#" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Add New</!a-->
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <form action="{{route('ads.update',$ad->id)}}" method="post" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                @method('PATCH')
                <div class="text-center mb-4">
                    <img src="{{Storage::url($ad->image)}}" class="w-50 img-fluid img-thumbnail" alt="{{$ad->name}}">
                    <input type="hidden" name="oldImage" value="{{$ad->image}}">
                </div>
                <div class="row d-flex">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="name">Name ad</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror " value="{{$ad->name}}" name="name" id="name" aria-describedby="helpId" autocomplete="off">
                            @error('name')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputFile">Image <small class="text-muted">Dimension must be (1016px x 472px)</small></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" accept="image/*" class="custom-file-input @error('name') is-invalid @enderror " value="{{old('name')}}" id="exampleInputFile">
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
                @include('includes.components.btnChange')
            </div>
        </form>
    </div>
@endsection