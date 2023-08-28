@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>{{$title}}</h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{route('material-out.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Create New {{$title}}</a>
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
                    <th>Material Name</th>
                    <th>Date</th>
                    <th>Qty</th>
                    <th>Action</th>
                </tr>
                @foreach ($materialOuts as $materialOut)
                    <tr>
                        <td>{{$materialOut->material->name}}</td>
                        <td>{{indodate($materialOut->date)}}</td>
                        <td>{{$materialOut->qty}} {{$materialOut->material->uom->name}}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('material-out.edit',$materialOut->id)}}" class="btn btn-warning btn-sm mr-2 text-white"><i class="fas fa-pencil-alt"></i></a>
                                <form action="{{route('material-out.destroy',$materialOut->id)}}" method="post" id="delete">
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
        <div class="card-footer">
            {{$materialOuts->links()}}
        </div>
    </div>
@endsection