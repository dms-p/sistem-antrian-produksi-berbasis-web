<?php

namespace App\Http\Controllers;

use App\Models\material;
use PDF;

class stockMaterialReport extends Controller
{
    public function __construct()
    {
        view()->share('title','Material');
        view()->share('icon','fa-box');
        view()->share('materials',material::all());
    }
    public function index()
    {
        return view('pages.index.indexMaterialStockReport');
    }
    public function pdf()
    {
        $pdf=PDF::loadView('pages.show.showMaterialStockReportPDF');
        return $pdf->stream('report.pdf');
    }
}
