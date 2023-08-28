<?php

namespace App\Http\Controllers;

use App\Http\Resources\messageResource;
use App\Models\completedOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class messageDatatablesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (Auth::user()->role_id==1) {
            $reports=messageResource::collection(completedOrder::where('status','pending')->orWhere('status','updated')->get());
        } else {
            $reports=messageResource::collection(completedOrder::where('status','rejected')->get());
        }
        return DataTables::of($reports)->make(true);
    }
}
