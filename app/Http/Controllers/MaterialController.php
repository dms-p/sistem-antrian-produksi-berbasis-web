<?php

namespace App\Http\Controllers;

use App\Http\Requests\materialRequest;
use App\Models\material;
use App\Models\uom;
use App\Services\materialServices;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    public function __construct()
    {
        view()->share('title','Material');
        view()->share('icon','fa-box');
        view()->share('uoms',uom::all());
        view()->share('categories',DB::select('select * from categories'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['materials']=material::all();
        return view('pages.index.indexMaterial', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create.createMaterial');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(materialRequest $request,materialServices $service)
    {
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            $service->store($request->all());
            return redirect()->route('material.index')->with(['status'=>'success','message'=>'Success Create New Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('material.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(material $material)
    {
        $data['material']=$material;
        return view('pages.edit.editMaterial',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(materialRequest $request,materialServices $service, material $material)
    {
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            $service->update($request->all(),$material->id);
            return redirect()->route('material.index')->with(['status'=>'success','message'=>'Success Update Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('material.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(material $material)
    {
        try {
            material::destroy($material->id);
            return redirect()->route('material.index')->with(['status'=>'success','message'=>'Success delete Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('material.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }
}
