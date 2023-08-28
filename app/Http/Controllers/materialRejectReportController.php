<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class materialRejectReportController extends Controller
{
    public function __construct()
    {
        view()->share('title','Order Report');
        view()->share('icon','fa-shopping-cart');
        view()->share('year','sdas');
        view()->share('month','sdas');
    }
    public function index($year=null,$month=null)
    {

    }
    public function pdf($year=null,$month=null)
    {

    }
}
