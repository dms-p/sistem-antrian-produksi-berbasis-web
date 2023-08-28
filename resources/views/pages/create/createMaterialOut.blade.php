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
        <form action="{{route('material-out.store')}}" method="post">
            <div class="card-body">
                @csrf
                <div class="row d-flex">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="material_id">Material Name</label>
                            <select class="custom-select @error('material_id') is-invalid @enderror " name="material_id" id="material_id">
                                <option disabled selected>Choose One</option>
                                @foreach ($materials as $material)
                                    <option value="{{$material->id}}">{{$material->name}}</option>
                                @endforeach
                            </select>
                            @error('material_id')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="text" class="form-control @error('date') is-invalid @enderror " value="{{old('date')}}" name="date" id="date" aria-describedby="helpId" autocomplete="off">
                            @error('date')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="qty">Qty</label>
                            <input type="text" class="form-control @error('qty') is-invalid @enderror " value="{{old('qty')}}" name="qty" id="qty" aria-describedby="helpId" autocomplete="off">
                            @error('qty')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea class="form-control @error('note') is-invalid @enderror " name="note" id="note" aria-describedby="helpId" autocomplete="off">{{old('note')}}</textarea>
                            @error('note')
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