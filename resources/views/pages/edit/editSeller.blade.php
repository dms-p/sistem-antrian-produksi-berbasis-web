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
        <form action="{{route('seller.update',$seller->id)}}" method="post">
            @method('PATCH')
            <div class="card-body">
                @csrf
                <div class="row d-flex">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="name">Name Seller</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror " value="{{$seller->name}}" name="name" id="name" aria-describedby="helpId" autocomplete="off">
                            @error('name')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="isActive">Is Active</label>
                            <select class="custom-select @error('isActive') is-invalid @enderror " name="isActive" id="isActive">
                                <option selected disabled>Select one</option>
                                @foreach ($IsActives as $IsActive)
                                @if ($IsActive==$seller->isActive)
                                    @php
                                        $selected='selected'
                                    @endphp
                                @else
                                    @php
                                        $selected=null
                                    @endphp
                                @endif
                                    <option {{$selected}} value="{{$IsActive}}">{{$IsActive}}</option>
                                @endforeach
                            </select>
                            @error('isActive')
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