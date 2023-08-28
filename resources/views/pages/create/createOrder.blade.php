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
        <form action="{{route('order.store')}}" method="post">
            <div class="card-body">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="invoice">Invoice Number</label>
                            <input type="text" class="form-control @error('invoice') is-invalid @enderror " value="{{old('invoice')}}" name="invoice" id="invoice" aria-describedby="helpId" autocomplete="off">
                            @error('invoice')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="customer_id">Customer</label>
                            <select class="js-example-basic-single custom-control" id="customer_id" name="customer_id" style="width:100%"></select>
                            @error('customer_id')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="sale_id">Seller</label>
                            <select class="custom-select @error('sale_id') is-invalid @enderror " name="sale_id" id="sale_id">
                                <option disabled selected>Choose One</option>
                                @foreach ($sellers as $seller)
                                    <option value="{{$seller->id}}">{{$seller->name}}</option>
                                @endforeach
                            </select>
                            @error('sale_id')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="service_id">Service</label>
                            <select class="custom-select @error('service_id') is-invalid @enderror " name="service_id" id="service_id">
                                <option disabled selected>Choose One</option>
                                @foreach ($services as $service)
                                    <option value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="qty">Qty</label>
                            <input type="text" class="form-control @error('qty') is-invalid @enderror " value="{{old('qty')}}" name="qty" id="qty" aria-describedby="helpId" autocomplete="off">
                            @error('qty')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="date_inv">Date Invoice</label>
                            <input type="text" class="form-control @error('date_inv') is-invalid @enderror " value="{{old('date_inv')}}" name="date_inv" id="date_inv" aria-describedby="helpId" autocomplete="off">
                            @error('date_inv')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="statusOrder">status Order</label>
                            <select class="custom-select @error('statusOrder') is-invalid @enderror " name="statusOrder" id="statusOrder">
                                <option disabled selected>Choose One</option>
                                @foreach ($statusOrder as $status)
                                    <option value="{{$status}}">{{$status}}</option>
                                @endforeach
                            </select>
                            @error('statusOrder')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="statusProcess">Status Process</label>
                            <select class="custom-select @error('statusProcess') is-invalid @enderror " name="statusProcess" id="statusProcess">
                                <option disabled selected>Choose One</option>
                                @foreach ($statusProcess as $status)
                                    <option value="{{$status}}">{{$status}}</option>
                                @endforeach
                            </select>
                            @error('statusProcess')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea class="form-control @error('note') is-invalid @enderror" name="note" id="note" rows="3">{{old('name')}}</textarea>
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
@section('script')
    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2({
                ajax: {
                    url: "{{route('customer.search')}}",
                    dataType:'json',
                    data: function (params) {
                        var query = {
                            search: params.term
                        }
                        return query;
                    }
                },
                placeholder: 'Type customer name',
                minimumInputLength: 2,
                allowClear: true,
                theme:'bootstrap4',
            });
        });
    </script>
@endsection