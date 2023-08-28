@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>Detail {{$title}} - {{$order->invoice}}</h1>
        </div>
        <div class="col-sm-6 text-right">
            <!--a href="#" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Add New</!a-->
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="text-center mb-3">
                <img class="img-fluid img-thumbnail w-50" src="{{asset('public/').Storage::url($order->customer->image)}}" alt="{{$order->customer->name}}">
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="invoice">Invoice Number</label>
                        <input disabled type="text" class="form-control" value="{{$order->invoice}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="customer_id">Customer</label>
                        <input disabled type="text" class="form-control" value="{{$order->customer->name}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="sale_id">Seller</label>
                        <input disabled type="text" class="form-control" value="{{$order->sales->name}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="service_id">Service</label>
                        <input disabled type="text" class="form-control" value="{{$order->service->name}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="date_inv">Date Invoice</label>
                        <input disabled type="text" class="form-control" value="{{$order->date_inv}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="statusOrder">status Order</label>
                        <input disabled type="text" class="form-control" value="{{$order->statusOrder}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="statusProcess">Status Process</label>
                        <input disabled type="text" class="form-control" value="{{$order->statusProcess}}">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="note">Note</label>
                        <textarea class="form-control" disabled rows="3">{{$order->note}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            @include('includes.components.btnBack')
        </div>
    </div>
@endsection