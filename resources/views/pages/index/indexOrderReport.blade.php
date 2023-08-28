@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>{{$title}}</h1>
        </div>
        <div class="col-sm-6 text-right">
            @if (count($orders)!=0)
                <a href="{{route('orderReport.pdf',[$yearReport,$monthReport])}}" target="__blank" class="btn btn-primary"><i class="fas fa-file-pdf mr-2"></i>Download as Pdf</a>
            @endif
        </div>
    </div>
@endsection
@section('content')
<form class="form-inline mb-3" action="{{route('orderReport.index')}}" method="POST">
    @csrf
    <div class="form-group mr-2">
        <select class="custom-select" required name="month" id="month">
            <option disabled selected>Choose Month</option>
            @foreach ($months as $month)
                <option value="{{$month->monthOrder}}">{{convertMonth($month->monthOrder)}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mr-2">
        <select class="custom-select" required name="year" id="year">
            <option disabled selected>Choose Year</option>
            @foreach ($years as $year)
                <option value="{{$year->yearOrder}}">{{$year->yearOrder}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search-plus mr-2" aria-hidden="true"></i>Find</button>
    </div>
</form>
    <div class="card">
        <div class="card-body">
            @if (count($orders)==0)
                <h3 class="text-center">No data</h3>
            @else
            <h1 class="text-center mb-4">Laporan Produksi</h1>
            <p>Bulan <b>{{convertMonth($monthReport)}} {{$yearReport}}</b></p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>printed at</th>
                        <th>finished at</th>
                        <th>Category</th>
                        <th>qty</th>
                        <th>Reject</th>
                        <th>Surplus</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$order->order->customer->name}}</td>
                            <td>{{indoDate($order->printed_at)}}</td>
                            <td>{{indoDate($order->finished_at)}}</td>
                            <td>{{$order->order->service->name}}</td>
                            <td>{{$order->order->qty}}</td>
                            <td>{{$order->order->failed_print}}</td>
                            <td>{{$order->order->surplus}}</td>
                            <td>{{$order->order->qty+$order->order->reject+$order->order->surplus}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
@endsection