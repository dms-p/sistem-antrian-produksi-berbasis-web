@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>{{$title}}</h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{route('order.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Create New {{$title}}</a>
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
    <div class="row">
        @foreach ($orders as $order)
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <small class="text-muted"><i class="fas fa-calendar-alt mr-2"></i>{{date_format(date_create($order->date_inv),'d-M-y')}} <i class="fas fa-bell ml-2 mr-2"></i>{{$order->service->name}}</small>
                        <div class="dropdown open ml-auto">
                            <button class="btn" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-caret-down" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <div class="dropdown-item">
                                    <a href="{{route('order.edit',$order->slug)}}" class="btn"><i class="fas fa-pencil-alt mr-2"></i>Edit</a>
                                </div>
                                <div class="dropdown-item">
                                    <a href="{{route('order.show',$order->slug)}}" class="btn"><i class="fas fa-eye mr-2"></i>Show</a>
                                </div>
                                <div class="dropdown-item">
                                    <form action="{{route('order.destroy',$order->slug)}}" method="post" id="delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn"><i class="fas fa-trash-alt mr-2"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="{{asset('public/').Storage::url($order->customer->image)}}" class="card-img-top" alt="{{$order->customer->name}}">
                    <div class="card-body">
                        <span class="badge text-uppercase badge-{{colorStatusProcess($order->statusProcess)}}">{{$order->statusProcess}}</span>
                        <p class="text-title">{{$loop->iteration}}. {{$order->customer->name}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection