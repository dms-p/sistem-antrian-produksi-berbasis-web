<?php

namespace App\Http\Controllers;

use App\Http\Resources\completedOrderResource;
use App\Models\completedOrder;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class completedOrderDatatablesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $reports=completedOrderResource::collection(completedOrder::all());
        return DataTables::of($reports)->make(true);
    }
}
