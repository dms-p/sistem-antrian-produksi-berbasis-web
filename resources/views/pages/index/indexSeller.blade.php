@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>{{$title}}</h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{route('seller.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Create New {{$title}}</a>
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
        <div class="card-body">
            <table class="table-striped table-bordered table-hover table">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Is Active</th>
                    <th>Action</th>
                </tr>
                @foreach ($sellers as $seller)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$seller->name}}</td>
                        <td>{{$seller->isActive}}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('seller.edit',$seller->id)}}" class="btn btn-warning btn-sm mr-2 text-white"><i class="fas fa-pencil-alt"></i></a>
                                <form action="{{route('seller.destroy',$seller->id)}}" method="post" id="delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection