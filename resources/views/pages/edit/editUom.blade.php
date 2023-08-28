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
        <div class="card-body">
            <form action="{{route('uom.update',$uom->id)}}" method="post">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-10 col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror " value="{{$uom->name}}" name="name" id="name" aria-describedby="helpId" autocomplete="off">
                            @error('name')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        @include('includes.components.btnChange')
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection