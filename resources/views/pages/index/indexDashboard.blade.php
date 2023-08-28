@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>{{$title}}</h1>
        </div>
        <div class="col-sm-6 text-right">
            <!--a href="#" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Add New</!a-->
        </div>
    </div>
@endsection
@section('content')
    <div class="alert alert-success" role="alert">
        Hi, <strong>{{Auth::user()->name}}</strong>, You are login as <strong>{{Auth::user()->role->name}}</strong>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Customers</span>
                    <span class="info-box-number">{{$customer}}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">User</span>
                    <span class="info-box-number">{{$user}}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Order</span>
                    <span class="info-box-number">{{$order}}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-print"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Print</span>
                    <span class="info-box-number">{{$total}}</span>
                </div>
            </div>
        </div>
    </div>
@endsection