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
        <form action="{{route('completed-order.store')}}" method="post">
            <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <h3>Order Form</h3>
                            <i class="text-muted">
                                loren ispum dolor amet, amet upsum dolot
                            </i>
                        </div>
                        <div class="col-md-8 col-sm-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="order_id">Customer Order</label>
                                        <select class="js-example-basic-single custom-control @error('order_id') is-invalid @enderror w-100" id="order_id" name="order_id"></select>
                                        @error('order_id')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="printed_at">Printed Date</label>
                                        <input type="text" name="printed_at" id="printed_at" class="form-control @error('printed_at') is-invalid @enderror " autocomplete="off" aria-describedby="helpId">
                                        @error('printed_at')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="finished_at">Finished Date</label>
                                        <input type="text" name="finished_at" id="finished_at" class="form-control @error('finished_at') is-invalid @enderror " autocomplete="off" aria-describedby="helpId">
                                        @error('finished_at')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="failed_print">Failed Print</label>
                                        <input type="text" name="failed_print" id="failed_print" class="form-control @error('failed_print') is-invalid @enderror " autocomplete="off" aria-describedby="helpId">
                                        @error('failed_print')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="surplus">Surplus</label>
                                        <input type="text" name="surplus" id="surplus" class="form-control @error('surplus') is-invalid @enderror " autocomplete="off" aria-describedby="helpId">
                                        @error('surplus')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="take_stock">Take Warehouse</label>
                                        <input type="text" name="take_stock" id="take_stock" class="form-control @error('take_stock') is-invalid @enderror " autocomplete="off" aria-describedby="helpId">
                                        @error('take_stock')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="faulty_couse">Faulty Couse</label>
                                        <textarea name="faulty_couse" class="form-control @error('faulty_couse') is-invalid @enderror" id="faulty_couse" cols="30" rows="5">-</textarea>
                                        @error('faulty_couse')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <h3>Material Form</h3>
                            <i class="text-muted">
                                loren ispum dolor amet, amet upsum dolot
                            </i>
                        </div>
                        <div class="col-md-8 col-sm-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bundle_id">Material Bundle</label>
                                        <select class="custom-select @error('bundle_id') is-invalid @enderror" name="bundle_id" id="bundle_id">
                                            <option selected disabled>Choose One</option>
                                            @foreach ($bundles as $bundle)
                                                <option value="{{$bundle->id}}">{{$bundle->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('bundle_id')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="materialForm"></div>
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
                    url: "{{route('completed-order.search')}}",
                    dataType:'json',
                    data: function (params) {
                        var query = {
                            search: params.term
                        }
                        return query;
                    }
                },
                placeholder: 'Type Sales Order Number',
                minimumInputLength: 2,
                allowClear: true,
                theme:'bootstrap4',
            });
            $(document).on('change','#bundle_id',function()
            {
                var bundle=$(this).val();
                $.ajax({
                    url:"{{route('dashboard.index')}}"+"/completed-order/material-report/"+bundle,
                    type:"get",
                    dataype:"html",
                    cache:false,
                    beforeSend:function()
                    {
                        $("#materialForm").html(null)
                    },
                    success:function(response)
                    {
                        $("#materialForm").html(response)
                    }
                });
            })
        });
    </script>
@endsection