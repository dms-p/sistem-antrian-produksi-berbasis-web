@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>Show {{$title}}</h1>
        </div>
        <div class="col-sm-6 text-right">
            <!--a href="#" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Add New</!a-->
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('reject.update',$order->slug)}}" method="post">
                @method('PUT')
                @csrf
                <div class="w-50">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Customer</label>
                                <input type="text" disabled class="form-control" value="{{$order->order->customer->name}}" name="name" id="name" aria-describedby="helpId" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea disabled class="form-control @error('note') is-invalid @enderror " name="note" id="note">{{$order->note}}</textarea>
                                @error('note')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{route('completed-order.edit',$order->slug)}}" class="btn btn-primary">Update report</a>
            </form>
        </div>
    </div>
@endsection