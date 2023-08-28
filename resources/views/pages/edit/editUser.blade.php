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
        <form action="{{route('user.update',$user->id)}}" method="post">
            <div class="card-body">
                @csrf
                @method('PATCH')
                <div class="row d-flex">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror " value="{{$user->name}}" name="name" id="name" aria-describedby="helpId" autocomplete="off">
                            @error('name')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="role_id">Category</label>
                            <select class="custom-select @error('role_id') is-invalid @enderror " name="role_id" id="role_id">
                                @foreach ($roles as $role)
                                @if ($role->id==$user->role_id)
                                    @php
                                        $selected='selected'
                                    @endphp
                                @else
                                    @php
                                        $selected=null
                                    @endphp
                                @endif
                                    <option {{$selected}} value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror " value="{{$user->email}}" name="email" id="email" aria-describedby="helpId" autocomplete="off">
                            @error('email')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control @error('password') is-invalid @enderror " value="{{old('password')}}" name="password" id="password" aria-describedby="helpId" autocomplete="off">
                            @error('password')
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