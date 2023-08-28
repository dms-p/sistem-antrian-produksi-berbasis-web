<?php

namespace App\Http\Controllers;

use App\Http\Requests\uomRequest;
use App\Models\uom;
use App\Services\uomServices;

class UomController extends Controller
{
    public function __construct()
    {
        view()->share('title','Stock Unit');
        view()->share('icon','fa-tag');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['uoms']=uom::all();
        return view('pages.index.indexUom',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create.createUom');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(uomRequest $request, uomServices $service)
    {
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            $service->store($request->all());
            return redirect()->route('uom.index')->with(['status'=>'success','message'=>'Success Create New Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('uom.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\uom  $uom
     * @return \Illuminate\Http\Response
     */
    public function show(uom $uom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\uom  $uom
     * @return \Illuminate\Http\Response
     */
    public function edit(uom $uom)
    {
        $data['uom']=$uom;
        return view('pages.edit.editUom',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\uom  $uom
     * @return \Illuminate\Http\Response
     */
    public function update(uomRequest $request, uomServices $service, uom $uom)
    {
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            $service->update($request->all(),$uom->id);
            return redirect()->route('uom.index')->with(['status'=>'success','message'=>'Success Update Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('uom.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\uom  $uom
     * @return \Illuminate\Http\Response
     */
    public function destroy(uom $uom)
    {
        try {
            uom::destroy($uom->id);
            return redirect()->route('uom.index')->with(['status'=>'success','message'=>'Success delete Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('uom.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }
}
