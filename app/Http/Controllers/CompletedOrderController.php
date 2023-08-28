<?php

namespace App\Http\Controllers;

use App\Http\Requests\completedOrderRequest;
use App\Http\Resources\completedOrderResource;
use App\Models\bundle;
use App\Models\completedOrder;
use App\Models\materialReport;
use App\Models\order;
use App\Services\completedOrderServices;
use Illuminate\Support\Str;
USE Illuminate\Support\Facades\DB;

class CompletedOrderController extends Controller
{
    public function __construct()
    {
        view()->share('title','Completed Order');
        view()->share('icon','fa-shopping-cart');
        view()->share('bundles',bundle::all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.index.indexCompletedOrder');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create.createCompletedOrder');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(completedOrderRequest $request,completedOrderServices $service)
    {
        $order=$request->all();
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            $order['author_id']=1;
            $order['status']='pending';
            $order['slug']=Str::slug(Str::random(24));
            $service->store($order);
            return redirect()->route('completed-order.create')->with(['status'=>'success','message'=>'Success Create New Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('completed-order.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\completedOrder  $completedOrder
     * @return \Illuminate\Http\Response
     */
    public function show(completedOrder $completedOrder)
    {
        $data['report']=$completedOrder;
        $data['materials']=materialReport::where('order_id',$completedOrder->order_id)->get();
        return view('pages.show.showCompletedOrder',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\completedOrder  $completedOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(completedOrder $completedOrder)
    {
        $data['report']=$completedOrder;
        $data['materials']=materialReport::where('order_id',$completedOrder->order_id)->get();
        return view('pages.edit.editCompletedOrder',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\completedOrder  $completedOrder
     * @return \Illuminate\Http\Response
     */
    public function update(completedOrderRequest $request,completedOrderServices $service, completedOrder $completedOrder)
    {
        $order=$request->all();
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            $order['author_id']=1;
            $order['status']='updated';
            $order['slug']=$completedOrder->slug;
            $service->update($order,$completedOrder->id);
            return redirect()->route('completed-order.index')->with(['status'=>'success','message'=>'Success Create New Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('completed-order.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\completedOrder  $completedOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(completedOrder $completedOrder)
    {
        DB::beginTransaction();
        try {
            completedOrder::find($completedOrder->id)->delete();
            materialReport::where('order_id',$completedOrder->order_id)->delete();
            order::find($completedOrder->order_id)->update(['statusProcess'=>"packing"]);
            DB::commit();
            return redirect()->route('completed-order.index')->with(['status'=>'success','message'=>'Success delete Data!']);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('completed-order.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }
}
