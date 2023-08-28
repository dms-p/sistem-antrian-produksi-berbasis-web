<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Produksi - {{convertMonth($monthReport)}} - {{$yearReport}}</title>
    @include('pages.css.table')
</head>
<body>
    <header>
        <h1 class="text-center text-uppercase mb-4">Laporan Produksi</h1>
        <p>Bulan <b>{{convertMonth($monthReport)}} {{$yearReport}}</b></p>
    </header>
    <table class="table table-striped mb-5">
        <thead>
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>printed at</th>
                <th>finished at</th>
                <th>Category</th>
                <th>qty</th>
                <th>Reject</th>
                <th>Surplus</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalqty=0;$totalReject=0;$totalSurplus=0;
            @endphp
            @foreach ($orders as $order)
                <tr style="background-color: {{$order->order->service->color}}">
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{$order->order->customer->name}}</td>
                    <td>{{indoDate($order->printed_at)}}</td>
                    <td>{{indoDate($order->finished_at)}}</td>
                    <td class="text-center">{{$order->order->service->name}}</td>
                    <td class="text-center">{{$order->order->qty}}</td>
                    <td class="text-center">{{$order->order->failed_print}}</td>
                    <td class="text-center">{{$order->order->surplus}}</td>
                    <td class="text-center">{{$order->order->qty+$order->order->reject+$order->order->surplus}}</td>
                </tr>
                @php
                    $totalqty+=$order->order->qty;
                    $totalReject+=$order->order->failed_print;
                    $totalSurplus+=$order->order->surplus;
                @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5">Grand Total</th>
                <th>{{$totalqty}}</th>
                <th>{{$totalReject}}</th>
                <th>{{$totalSurplus}}</th>
                <th>{{$totalqty+$totalReject+$totalSurplus}}</th>
            </tr>
        </tfoot>
    </table>
    <span class="text-small">Printed by <b><i>{{Auth::user()->name}}</i></b>, at {{date('Y-m-d, H:i:s')}}</span>
</body>
</html>
