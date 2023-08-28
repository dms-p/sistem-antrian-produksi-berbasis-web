<?php

namespace App\Http\Controllers;

use App\Models\bundle;

class materialReportFormController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $data['bundle']=bundle::find($id);
        return view('pages.create.createMaterialReport', $data);
    }
}