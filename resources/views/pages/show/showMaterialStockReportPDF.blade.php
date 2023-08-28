<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Material Report Stock</title>
    @include('pages.css.table')
</head>
<body>
    <header>
        <h1 class="text-center text-uppercase mb-4">Laporan Stock</h1>
    </header>
    <table class="table table-striped mb-5">
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
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{$material->name}}</td>
                    <td class="text-center">{{$material->stock}} {{$material->uom->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <span class="text-small">Printed by <b><i>{{Auth::user()->name}}</i></b>, at {{date('Y-m-d, H:i:s')}}</span>
</body>
</html>