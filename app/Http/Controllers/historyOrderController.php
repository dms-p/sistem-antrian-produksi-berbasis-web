<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class historyOrderController extends Controller
{
    public function __construct()
    {
        view()->share('title','History Order');
        view()->share('icon','fa-shopping-cart');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('pages.index.indexHistoryOrder');
    }
}
