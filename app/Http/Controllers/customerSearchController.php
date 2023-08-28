<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class customerSearchController extends Controller
{
    public function __construct()
    {
        view()->share('title','Customer');
        view()->share('icon','fa-users');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->keyword==null) {
            return redirect()->route('customer.index');
        }
        $data['keyword']=$request->keyword;
        $data['customers']=customer::where('name','like',"%$request->keyword%")->paginate(12);
        return view('pages.index.indexCustomer', $data);
    }
}
