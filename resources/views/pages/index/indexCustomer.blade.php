@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>{{$title}}
                @if (isset($keyword))
                    : {{$keyword}}
                @endif
            </h1>
        </div>
        <div class="col-sm-6 d-flex justify-content-end">
            <form action="{{route('search')}}" method="get"  class="mr-3">
                @csrf
                <div class="input-group">
                    <input type="search" name="keyword" value="{{@$keyword}}" id="keyword" placeholder="fill keyword" class="form-control" placeholder="" aria-describedby="helpId">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </span>
                </div>
            </form>
            <a href="{{route('customer.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Create New {{$title}}</a>
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
        @foreach ($customers as $customer)
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="card-header ml-auto">
                        <div class="dropdown open">
                            <button class="btn" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-caret-down" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <div class="dropdown-item"><a href="{{route('customer.edit',$customer->slug)}}" class="btn"><i class="fas fa-pencil-alt mr-2"></i>Edit</a></div>
                                <div class="dropdown-item">
                                    <form action="{{route('customer.destroy',$customer->slug)}}" method="post" id="delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn"><i class="fas fa-trash-alt mr-2"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="{{asset('public/').Storage::url($customer->image)}}" class="card-img-top" alt="{{$customer->name}}">
                    <div class="card-body">
                        <p class="text-body">{{$customer->name}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{$customers->links()}}
@endsection