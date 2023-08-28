<?php

namespace App\Http\Controllers;

use App\Http\Requests\bundleRequest;
use App\Models\bundle;
use App\Models\category;
use App\Models\material;
use App\Services\bundleServices;
use Illuminate\Http\Request;

class BundleController extends Controller
{
    public function __construct()
    {
        view()->share('title','Bundle Materials');
        view()->share('icon','fa-boxes');
        view()->share('categories',category::all());
        view()->share('materials',material::all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bundles']=bundle::all();
        return view('pages.index.indexBundle', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create.createBundle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(bundleRequest $request,bundleServices $service)
    {
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            $service->store($request->all());
            return redirect()->route('bundle.index')->with(['status'=>'success','message'=>'Success Create New Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('bundle.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function show(bundle $bundle)
    {
        $data['bundle']=$bundle;
        return view('pages.show.showBundle', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function edit(bundle $bundle)
    {
        $data['bundle']=$bundle;
        return view('pages.edit.editBundle', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function update(bundleRequest $request,bundleServices $service, bundle $bundle)
    {
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            $service->update($request->all(),$bundle->id);
            return redirect()->route('bundle.index')->with(['status'=>'success','message'=>'Success Update Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('bundle.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function destroy(bundle $bundle)
    {
        try {
            bundle::destroy($bundle->id);
            return redirect()->route('bundle.index')->with(['status'=>'success','message'=>'Success delete Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('bundle.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }
}
