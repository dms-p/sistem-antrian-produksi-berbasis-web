<?php

namespace App\Http\Controllers;

use App\Http\Requests\materialOpnameRequest;
use App\Models\material;
use App\Models\materialOpname;
use App\Services\materialOpnameServices;
use Illuminate\Http\Request;

class MaterialOpnameController extends Controller
{
    public function __construct()
    {
        view()->share('title','Material Opname');
        view()->share('icon','fa-boxes');
        view()->share('materials',material::all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['materialOpnames']=materialOpname::orderBy('date','DESC')->paginate(10);
        return view('pages.index.indexMaterialOpname', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create.createMaterialOpname');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(materialOpnameRequest $request,materialOpnameServices $service)
    {
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            $service->store($request->all());
            return redirect()->route('material-opname.index')->with(['status'=>'success','message'=>'Success Create New Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('material-opname.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\materialOpname  $materialOpname
     * @return \Illuminate\Http\Response
     */
    public function show(materialOpname $materialOpname)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\materialOpname  $materialOpname
     * @return \Illuminate\Http\Response
     */
    public function edit(materialOpname $materialOpname)
    {
        $data['item']=$materialOpname;
        return view('pages.edit.editMaterialOpname',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\materialOpname  $materialOpname
     * @return \Illuminate\Http\Response
     */
    public function update(materialOpnameRequest $request,materialOpnameServices $service, materialOpname $materialOpname)
    {
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            $service->update($request->all(),$materialOpname->id);
            return redirect()->route('material-opname.index')->with(['status'=>'success','message'=>'Success Update Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('material-opname.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\materialOpname  $materialOpname
     * @return \Illuminate\Http\Response
     */
    public function destroy(materialOpname $materialOpname)
    {
        try {
            materialOpname::destroy($materialOpname->id);
            return redirect()->route('material-opname.index')->with(['status'=>'success','message'=>'Success delete Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('material-opname.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }
}
