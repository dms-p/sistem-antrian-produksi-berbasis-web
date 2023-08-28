<?php

namespace App\Http\Controllers;

use App\Http\Requests\orderRequest;
use App\Models\customer;
use App\Models\order;
use App\Models\sales;
use App\Services\orderServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function __construct()
    {
        view()->share('title','Order');
        view()->share('icon','fa-shopping-cart');
        view()->share('statusOrder',['New Customer', 'Repeat Order','Return']);
        view()->share('statusProcess',['antri', 'print','collecting','press','plong','sorting','packing']);
        view()->share('services',DB::select('select * from services'));
        view()->share('sellers',sales::where('isActive','yes')->get());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['orders']=order::where('statusProcess','!=','reported')->orderBy('date_inv','ASC')->get();
        return view('pages.index.indexOrder',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create.createOrder');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(orderRequest $request,orderServices $service)
    {
        $data=$request->all();
        $data['slug']=Str::slug(Str::random(24));
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            $data['failed_print']=0;
            $data['surplus']=0;
            $data['take_stock']=0;
            $service->store($data);
            return redirect()->route('order.create')->with(['status'=>'success','message'=>'Success Create New Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('order.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        $data['order']=$order;
        return view('pages.show.showOrder',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        $data['order']=$order;
        return view('pages.edit.editOrder',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(orderRequest $request,orderServices $service, order $order)
    {
        $data=$request->all();
        $data['slug']=$order->slug;
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            $data['failed_print']=0;
            $data['surplus']=0;
            $data['take_stock']=0;
            $service->update($data,$order->id);
            return redirect()->route('order.index')->with(['status'=>'success','message'=>'Success Update Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('order.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        try {
            order::destroy($order->id);
            return redirect()->route('order.index')->with(['status'=>'success','message'=>'Success delete Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('order.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }
}
