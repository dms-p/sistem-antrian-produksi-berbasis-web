@extends('layouts.admin')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas mr-2 {{$icon}}"></i>{{$title}}</h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{route('material-stock.pdf')}}" target="__blank" class="btn btn-primary"><i class="fas fa-file-pdf mr-2"></i>Download as Pdf</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">Laporan Stock</h1>
            <table class="table striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Material Name</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materials as $material)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$material->name}}</td>
                            <td>{{$material->stock}} {{$material->uom->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection