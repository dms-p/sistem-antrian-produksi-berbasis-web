<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>:: Media Informasi Antrian Cetak ::</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="{{asset('public/js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/js/index.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('public/css/adminlte.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('public/css/animate.css')}}"/>
        <link rel="stylesheet" href="{{asset('public/css/index.min.css')}}"/>
        <style>
        #headerTable
        {
            text-align:Center;
        }
        </style>
    </head>
    <body id="bg-body">
        <div id="header" class="bg-blue-opacity mt-3">
            <div class="container-fluid d-flex align-items-center">
                <img class="float-left" src="{{asset('public/images/logo-1.png')}}" width="75%">
                <div class="float-right ml-auto text-center section-time bg-blue">
                    <h2 id="time" class="text-warning">time</h2>
                    <p id="date" class="text-white">date</p>
                </div>
                <div style="clear: both"></div>
            </div>
        </div>
        <div class="container-fluid mt-3 p-4">
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-body">
                            <table class="header shadow">
                                <thead>
                                <tr><th id="headerTable" colspan="6">PRODUKSI HARI INI</th></tr>
                                <tr>
                                    <th width="7%" class="text-center">NO</th>
                                    <th width="53%" class="text-center">NAMA CUSTOMER</th>
                                    <th width="12%" class="text-center">QTY</th>
                                    <th width="16%" class="text-center">TGL ORDER</th>
                                    <th width="12%" class="text-center">STATUS</th>
                                </tr>
                                </thead>
                            </table>
                            <div id="table-content">
                                <table class="table table-striped" id='tableisi'>
                                    <tbody id="tbody">
                                        @foreach ($orders as $order)
                                            @if ($loop->iteration==1)
                                                @php
                                                    $active='active'
                                                @endphp
                                            @else
                                                @php
                                                    $active=null
                                                @endphp
                                            @endif
                                                <tr class="{{$active}}" id="table">
                                                        <td class="text-center" width="7%" ><b>{{$loop->iteration}}</b></td>
                                                        <td width="53%"><b>{{$order->customer->name}}</b><br><i><small>Ket : {{$order->note}}</small></i></td>
                                                        <td class="text-center" width="12%"><b>{{number_format($order->qty)}} Pcs</b></td>
                                                        <td class="text-center" width="16%"><b>{{date_format(date_create($order->date_inv),'Y-m-d')}}</b></td>
                                                        <td><span class="badge text-uppercase badge-{{colorStatusProcess($order->statusProcess)}}"><b>{{$order->statusProcess}}</b></span></td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow mb-2">
                        <div class="card-body">
                            <div class="image-inner" id="image-inner">
                                @foreach ($orders as $order)
                                    @if ($loop->iteration==1)
                                        @php
                                            $active='active-image'
                                        @endphp
                                    @else
                                        @php
                                            $active=null
                                        @endphp
                                    @endif
                                    <div class="image-item {{$active}}" id="image-item">
                                        <img class="d-block img-fluid w-100" src="{{asset('public/').Storage::url($order->customer->image)}}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="container-fluid">
                <marquee>SELAMAT DATANG DI CETAKIDCARD.CO.ID | lihat juga di website kami lainya : cetakidcardsurabaya.com </marquee>
            </div>
        </div>
    </body>
</html>