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
        <form action="{{route('material.update',$material->id)}}" method="post">
            <div class="card-body">
                @csrf
                @method('PATCH')
                <div class="row d-flex">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="name">Name Material</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror " value="{{$material->name}}" name="name" id="name" aria-describedby="helpId" autocomplete="off">
                            @error('name')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control @error('stock') is-invalid @enderror " value="{{$material->stock}}" name="stock" id="stock" aria-describedby="helpId" autocomplete="off">
                            @error('stock')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="custom-select @error('category_id') is-invalid @enderror " name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                @if ($category->id==$material->category_id)
                                    @php
                                        $selected='selected'
                                    @endphp
                                @else
                                    @php
                                        $selected=null
                                    @endphp
                                @endif
                                    <option {{$selected}} value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="uom_id">Stock Unit</label>
                            <select class="custom-select @error('uom_id') is-invalid @enderror " name="uom_id" id="uom_id">
                                @foreach ($uoms as $uom)
                                @if ($uom->id==$material->uom_id)
                                    @php
                                        $selected='selected'
                                    @endphp
                                @else
                                    @php
                                        $selected=null
                                    @endphp
                                @endif
                                    <option {{$selected}} value="{{$uom->id}}">{{$uom->name}}</option>
                                @endforeach
                            </select>
                            @error('uom_id')
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