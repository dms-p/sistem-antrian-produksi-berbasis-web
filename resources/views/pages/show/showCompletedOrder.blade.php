@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>Detail {{$title}}, [{{$report->order->invoice}}]</h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{route('reject.edit',$report->slug)}}" class="btn btn-outline-danger mr-2"><i class="fas fa-window-close mr-2"></i>Reject</a>
            @if ($report->status=="accepted")
                <a href="{{route('completed-order.pdf',$report->slug)}}" class="btn btn-success"><i class="fas fa-print mr-2"></i>Print</a>
            @else
                <a href="{{route('completed-order.accept',$report->slug)}}" class="btn btn-primary"><i class="fas fa-check-circle mr-2"></i>Accept</a>
            @endif
        </div>
    </div>
@endsection
@section('content')
    @if (session('status'))
        <div class="alert alert-{{session('status')}} alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>{{session('message')}}
        </div>
    @endif
    <div class="card">
        <div class="card-body pl-5 pr-5">
            <h1 class="text-center text-uppercase">Order Report</h1>
            <p class="text-center mb-4">Sales order Number : <b class="text-uppercase">{{$report->order->invoice}}</b></p>
            <div class="row">
                <div class="col-md-5 col-sm-5">
                    <table class="table table-borderless">
                        <tr class="p-0">
                            <th class="p-0 w-25">Customer</th>
                            <td class="p-0">: {{$report->order->customer->name}}</td>
                        </tr>
                        <tr class="p-0">
                            <th class="p-0 w-25">Printed Date</th>
                            <td class="p-0">: {{$report->printed_at}}</td>
                        </tr>
                        <tr class="p-0">
                            <th class="p-0 w-25">Finished Date</th>
                            <td class="p-0">: {{$report->finished_at}}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-2 col-sm-2"></div>
                <div class="col-md-5 col-sm-5">
                    <table class="table table-borderless">
                        <tr class="p-0">
                            <th class="p-0 w-25">Sales</th>
                            <td class="p-0">: {{$report->order->sales->name}}</td>
                        </tr>
                        <tr class="p-0">
                            <th class="p-0 w-25">Status Order</th>
                            <td class="p-0">: {{$report->order->statusOrder}}</td>
                        </tr>
                        <tr class="p-0">
                            <th class="p-0 w-25">Category</th>
                            <td class="p-0">: {{$report->order->service->name}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <span class="badge badge-dark pl-3 pr-3 pt-2 mb-2"><h5>Material Report</h5></span>
            <table class="table table-bordered">
                <tr class="bg-dark text-white">
                    <th style="width:5%">No</th>
                    @foreach ($materials as $item)
                    <th class="text-center">{{$item->material->name}}</th>
                    @endforeach
                </tr>
                <tr>
                    <th style="width:5%">1</th>
                    @foreach ($materials as $item)
                        <th class="text-center">{{$item->qty}} {{$item->material->uom->name}}</th>
                    @endforeach
                </tr>
            </table>
            <span class="badge badge-dark pl-3 pr-3 pt-2 mt-2 mb-2"><h5>Production Report</h5></span>
            <table class="table table-bordered mb-4">
                <tr class="bg-dark text-white">
                    <th style="width:5%">No</th>
                    <th class="text-center">Qty Order</th>
                    <th class="text-center">Reject</th>
                    <th class="text-center">Surplus</th>
                    <th class="text-center">Ambil Stock</th>
                </tr>
                <tr>
                    <th style="width:5%">1</th>
                    <td class="text-center">{{$report->order->qty}}</td>
                    <td class="text-center">{{$report->order->failed_print}}</td>
                    <td class="text-center">{{$report->order->surplus}}</td>
                    <td class="text-center">{{$report->order->take_stock}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection