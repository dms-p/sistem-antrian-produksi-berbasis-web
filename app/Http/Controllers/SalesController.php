<?php

namespace App\Http\Controllers;

use App\Http\Requests\salesRequest;
use App\Models\sales;
use App\Services\salesServices;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function __construct()
    {
        view()->share('title','Sales');
        view()->share('icon','fa-user-friends');
        view()->share('IsActives',['yes','no']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sellers']=sales::all();
        return view('pages.index.indexSeller', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create.createSeller');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(salesRequest $request,salesServices $service)
    {
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            $service->store($request->all());
            return redirect()->route('seller.index')->with(['status'=>'success','message'=>'Success Create New Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('seller.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(sales $sales)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['seller']=sales::find($id);
        return view('pages.edit.editSeller', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(salesRequest $request,salesServices $service, $id)
    {
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            $service->update($request->all(),$id);
            return redirect()->route('seller.index')->with(['status'=>'success','message'=>'Success Create New Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('seller.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            sales::destroy($id);
            return redirect()->route('seller.index')->with(['status'=>'success','message'=>'Success delete Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('seller.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }
}
