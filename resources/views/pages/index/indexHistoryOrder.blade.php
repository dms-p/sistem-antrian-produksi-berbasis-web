@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>{{$title}}</h1>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <table id="table" class="w-100 table-hover table-striped">
                <thead>
                    <tr>
                        <th class="text-center">So Number</th>
                        <th class="text-center">Customer</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Order Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#table").dataTable({
                processing:true,
                serverSide:true,
                ajax:"{{route('order.datatables')}}",
                columns:[
                    {data:'SO_number',name:'SO_number'},
                    {data:'Customer',name:'Customer'},
                    {data:'qty',name:'qty'},
                    {data:'date_inv',name:'date_inv'},
                    {data:'status',name:'status'},
                    {data:'action',name:'action'},
                ]
            });
        });
    </script>
@endsection