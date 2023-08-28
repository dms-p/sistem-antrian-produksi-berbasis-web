<?php

namespace App\Http\Controllers;

use App\Http\Requests\materialOutRequest;
use App\Http\Requests\materialRequest;
use App\Models\material;
use App\Models\materialOut;
use App\Services\materialOutServices;
use Illuminate\Http\Request;

class MaterialOutController extends Controller
{
    public function __construct()
    {
        view()->share('title','Material out');
        view()->share('icon','fa-box-open');
        view()->share('materials',material::all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['materialOuts']=materialOut::orderBy('date','DESC')->paginate(10);
        return view('pages.index.indexMaterialOut', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create.createMaterialOut');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(materialOutRequest $request,materialOutServices $service)
    {
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            $service->store($request->all());
            return redirect()->route('material-out.index')->with(['status'=>'success','message'=>'Success Create New Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('material-out.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\materialOut  $materialOut
     * @return \Illuminate\Http\Response
     */
    public function show(materialOut $materialOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\materialOut  $materialOut
     * @return \Illuminate\Http\Response
     */
    public function edit(materialOut $materialOut)
    {
        $data['item']=$materialOut;
        return view('pages.edit.editMaterialOut',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\materialOut  $materialOut
     * @return \Illuminate\Http\Response
     */
    public function update(materialOutRequest $request, materialOut $materialOut,materialOutServices $service)
    {
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            $service->update($request->all(),$materialOut->id);
            return redirect()->route('material-out.index')->with(['status'=>'success','message'=>'Success Update Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('material-out.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\materialOut  $materialOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(materialOut $materialOut)
    {
        try {
            materialOut::destroy($materialOut->id);
            return redirect()->route('material-out.index')->with(['status'=>'success','message'=>'Success delete Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('material-out.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }
}
