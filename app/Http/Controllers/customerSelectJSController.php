<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class customerSelectJSController extends Controller
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
        $customer_id=$request->search;
        $no=0;
        $customers=customer::where('name','like',"%$customer_id%")->get();
        foreach ($customers as $customer) {
            $data['results'][$no]=['id'=>$customer->id,'text'=>$customer->name];
            $no++;
        }
        return $data;
    }
}
