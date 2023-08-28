@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>{{$title}}</h1>
        </div>
            
            @if (Auth::user()->role_id==2)
            <div class="col-sm-6 text-right">
                <a href="{{route('completed-order.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Create New {{$title}}</a>
            </div>
            @endif
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
        <div class="card-body">
            <table id="table" class="w-100 table-hover table-striped">
                <thead>
                    <tr>
                        <th class="text-center">So Number</th>
                        <th class="text-center">Customer</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Finished At</th>
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
                ajax:"{{route('completed-order.datatables')}}",
                columns:[
                    {data:'SO_number',name:'SO_number'},
                    {data:'Customer',name:'Customer'},
                    {data:'QTY_Order',name:'QTY_Order'},
                    {data:'finished_at',name:'finished_at'},
                    {data:'status',name:'status'},
                    {data:'action',name:'action'},
                ]
            });
        });
    </script>
@endsection