<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function __construct()
    {
        view()->share('title','Dashboard');
        view()->share('icon','fa-home');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $data['customer']=customer::all()->count();
        $data['user']=User::all()->count();
        $data['order']=order::all()->count();
        $data['total']=order::all()->sum(['qty']);
        return view('pages.index.indexDashboard',$data);
    }
}
