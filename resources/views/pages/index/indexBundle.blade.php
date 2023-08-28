@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>{{$title}}</h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{route('bundle.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Create New {{$title}}</a>
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
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th>Total Materials</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bundles as $bundle)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$bundle->name}}</td>
                            <td style="background-color: {{$bundle->color}}"></td>
                            <td>{{$bundle->materials()->count()}} <i>Material(s)</i></td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('bundle.edit',$bundle->id)}}" class="btn btn-warning btn-sm mr-2 text-white"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{route('bundle.destroy',$bundle->id)}}" method="post" id="delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    <a href="{{route('bundle.show',$bundle->id)}}" class="btn btn-success btn-sm ml-2 text-white"><i class="fas fa-eye"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection