@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>Detail {{$title}}</h1>
        </div>
        <div class="col-sm-6 text-right">
            <!--a href="#" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Add New</!a-->
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" disabled class="form-control" value="{{$bundle->name}}" name="name" id="name" aria-describedby="helpId" autocomplete="off">
                        </div>
                    </div>
                    <!-- showing material by catergory -->
                    @foreach ($bundle->materials as $material)
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="{{$material->category->name}}">{{$material->category->name}}</label>
                                <input disabled type="text" class="form-control" value="{{$material->name}}" name="{{$material->category->name}}" id="{{$material->category->name}}" aria-describedby="helpId" autocomplete="off">
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
        <div class="card-footer">
            @include('includes.components.btnBack')
        </div>
    </div>
@endsection