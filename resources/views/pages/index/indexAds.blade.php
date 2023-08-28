@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>{{$title}}</h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{route('ads.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Create New {{$title}}</a>
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
        @foreach ($ads as $ad)
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="card-header ml-auto">
                        <div class="dropdown open">
                            <button class="btn" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-caret-down" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <div class="dropdown-item"><a href="{{route('ads.edit',$ad->id)}}" class="btn"><i class="fas fa-pencil-alt mr-2"></i>Edit</a></div>
                                <div class="dropdown-item">
                                    <form action="{{route('ads.destroy',$ad->id)}}" method="post" id="delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn"><i class="fas fa-trash-alt mr-2"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="{{Storage::url($ad->image)}}" class="card-img-top" alt="{{$ad->name}}">
                    <div class="card-body">
                        <p class="text-body">{{$ad->name}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection