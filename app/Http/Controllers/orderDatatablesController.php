<?php

namespace App\Http\Controllers;

use App\Http\Resources\orderResource;
use App\Models\order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class orderDatatablesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $reports=orderResource::collection(order::all());
        return DataTables::of($reports)->make(true);
    }
}
