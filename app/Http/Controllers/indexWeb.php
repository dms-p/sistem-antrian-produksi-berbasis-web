<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class indexWeb extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $data['orders']=order::where('statusProcess','!=','reported')->orderBy('date_inv','ASC')->get();
        return view('index',$data);
    }
}
