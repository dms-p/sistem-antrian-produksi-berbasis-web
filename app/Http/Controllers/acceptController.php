<?php

namespace App\Http\Controllers;

use App\Models\completedOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class acceptController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(completedOrder $order)
    {
        try {
            completedOrder::find($order->id)->update(["status"=>"accepted","approvor_id"=>Auth::user()->id]);
            return redirect()->route('completed-order.show',$order->slug)->with(['status'=>'success','message'=>'Success Update data']);
        } catch (\Throwable $th) {
            return redirect()->route('completed-order.show',$order->slug)->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }
}
