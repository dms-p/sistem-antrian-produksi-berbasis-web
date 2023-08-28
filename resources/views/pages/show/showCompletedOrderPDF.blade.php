<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report - {{$report->order->invoice}} - {{$report->order->customer->name}}</title>
    @include('pages.css.table')
</head>
<body>
    <header>
        <h1 class="text-center text-uppercase mb-0">Order Report</h1>
        <p class="text-center mb-4">SO Number : <b class="text-uppercase">{{$report->order->invoice}}</b></p>
    </header>
    <div class="row">
        <div class="col-md-5 col-sm-5 float-left">
            <table class="table table-borderless">
                <tr class="p-0">
                    <th class="p-0 w-25 text-left">Customer </th>
                    <td class="p-0"> : {{$report->order->customer->name}}</td>
                </tr>
                <tr class="p-0">
                    <th class="p-0 w-25 text-left">Printed Date </th>
                    <td class="p-0"> : {{$report->printed_at}}</td>
                </tr>
                <tr class="p-0">
                    <th class="p-0 w-25 text-left">Finished Date</th>
                    <td class="p-0"> : {{$report->finished_at}}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-5 col-sm-5 float-right">
            <table class="table table-borderless">
                <tr class="p-0">
                    <th class="p-0 w-25 text-left">Sales</th>
                    <td class="p-0"> : {{$report->order->sales->name}}</td>
                </tr>
                <tr class="p-0">
                    <th class="p-0 w-25 text-left">Status Order</th>
                    <td class="p-0"> : {{$report->order->statusOrder}}</td>
                </tr>
                <tr class="p-0">
                    <th class="p-0 w-25 text-left">Category</th>
                    <td class="p-0"> : {{$report->order->service->name}}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="badge badge-dark mb-2">Material Report</div>
    <table class="table table-bordered mb-5">
        <thead>
            <tr class="bg-dark text-white">
                <th style="width:5%">No</th>
                @foreach ($materials as $item)
                <th class="text-center">{{$item->material->name}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="width:5%">1</th>
                @foreach ($materials as $item)
                    <th class="text-center">{{$item->qty}} {{$item->material->uom->name}}</th>
                @endforeach
            </tr>
        </tbody>
    </table>
    <div class="badge badge-dark mb-2">Production Report</div>
    <table class="table table-bordered mb-5">
        <thead>
            <tr class="bg-dark text-white">
                <th style="width:5%">No</th>
                <th class="text-center">Qty Order</th>
                <th class="text-center">Reject</th>
                <th class="text-center">Surplus</th>
                <th class="text-center">Ambil Stock</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="width:5%">1</th>
                <td class="text-center">{{$report->order->qty}}</td>
                <td class="text-center">{{$report->order->failed_print}}</td>
                <td class="text-center">{{$report->order->surplus}}</td>
                <td class="text-center">{{$report->order->take_stock}}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-borderless mb-2">
        <thead>
            <tr>
                <th>Manager Admin</th>
                <th>Production</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center pt-5">(......................)</td>
                <td class="text-center pt-5">{{!empty($report->author->name) ? $report->author->name : '(..........................)'}}</td>
                <td class="text-center pt-5">{{!empty($report->approvor->name) ? $report->approvor->name : '(..........................)'}}</td>
            </tr>
        </tbody>
    </table>
    <span class="text-small">Printed by <b><i>{{Auth::user()->name}}</i></b>, at {{date('Y-m-d, H:i:s')}}</span>
</body>
</html>