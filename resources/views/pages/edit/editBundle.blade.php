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
        <form action="{{route('bundle.update',$bundle->id)}}" method="post">
            <div class="card-body">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror " value="{{$bundle->name}}" name="name" id="name" aria-describedby="helpId" autocomplete="off">
                                @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- showing material by catergory -->
                        @foreach ($categories as $category)
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="{{$category->name}}">{{$category->name}}</label>
                                    <select class="custom-select" name="material_id[]" id="{{$category->name}}">
                                        <option value>Choose One</option>
                                        @foreach ($materials as $material)
                                            @if ($material->category_id==$category->id)
                                                <option value="{{$material->id}}">{{$material->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
            <div class="card-footer">
                @include('includes.components.btnChange')
            </div>
        </form>
    </div>
@endsection