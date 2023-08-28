<?php

namespace App\Http\Controllers;

use App\Models\completedOrder;
use App\Models\materialReport;
use PDF;

class completedOrderPDFController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(completedOrder $order)
    {
        $data['report']=$order;
        $data['materials']=materialReport::where('order_id',$order->order_id)->get();
        $pdf=PDF::loadView('pages.show.showCompletedOrderPDF',$data);
        if ($order->approvor_id!=null) {
            return $pdf->stream('report.pdf');
        }
        abort(401);
    }
}
