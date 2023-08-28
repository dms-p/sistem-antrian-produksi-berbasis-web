<?php

namespace App\Http\Controllers;

use App\Models\order;

use Illuminate\Http\Request;

class completedOrderSelectJsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data=array();
        $order_id=$request->search;
        $no=0;
        $orders=order::where('invoice','like',"%$order_id%")->where('statusProcess','!=','reported')->get();
        foreach ($orders as $order) {
            //$data['results'][$no]=['id'=>$order->id,'text'=>$order->invoice." - ".$order->customer->name." - ".$order->qty];
            $data['results'][$no]=['id'=>$order->id,'text'=>$order->customer->name." - ".$order->qty." Pcs"];
            $no++;
        }
        return $data;
    }
}
