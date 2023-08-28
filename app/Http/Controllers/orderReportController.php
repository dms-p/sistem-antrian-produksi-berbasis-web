<?php

namespace App\Http\Controllers;

use App\Models\completedOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class orderReportController extends Controller
{
    public function __construct()
    {
        view()->share('title','Order Report');
        view()->share('icon','fa-shopping-cart');
        view()->share('years',$this->getYear());
        view()->share('months',$this->getMonth());
    }
    public function index(Request $request)
    {
        $year=$request->year;
        $month=$request->month;
        $data['monthReport']=$month;
        $data['yearReport']=$year;
        $data['orders']=$this->getDataOrder($month,$year);
        //return $data;
        return view('pages.index.indexOrderReport',$data);
    }
    public function pdf($year=null,$month=null)
    {
        $data['monthReport']=$month;
        $data['yearReport']=$year;
        $data['orders']=$this->getDataOrder($month,$year);
        $pdf=PDF::loadView('pages.show.showOrderReportPDF',$data);
        return $pdf->setPaper('A4','landscape')->stream('report.pdf');
    }
    protected function getYear()
    {
        return DB::select('SELECT YEAR(finished_at) as yearOrder FROM `completed_orders`GROUP BY yearOrder ORDER BY yearOrder ASC');
    }
    protected function getMonth()
    {
        return DB::select('SELECT MONTH(finished_at) as monthOrder FROM `completed_orders`GROUP BY monthOrder ORDER BY monthOrder ASC');
    }
    protected function getDataOrder($month,$year)
    {
        return completedOrder::whereMonth('finished_at',$month)->whereYear('finished_at',$year)->get();
    }
}
