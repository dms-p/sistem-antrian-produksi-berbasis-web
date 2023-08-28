<?php

namespace App\Http\Controllers;

use App\Http\Requests\adsRequest;
use App\Http\Requests\adsUpdateRequest;
use App\Models\ads;
use App\Services\adsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{
    public function __construct()
    {
        view()->share('title','Advertising');
        view()->share('icon','fa-image');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ads']=ads::all();
        return view('pages.index.indexAds', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create.createAds');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(adsRequest $request,adsServices $service)
    {
        $ads=$request->all();
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        //get file image
        $getImage=$request->file('image');
        //get extention image
        $getExtension=$getImage->getClientOriginalExtension();
        //set new name image
        $setNewName=time().'.'.$getExtension;
        try {
            $upload=Storage::putFileAs('public/ads',$getImage,$setNewName);
            $ads['image']=$upload;
            $service->store($ads);
            return redirect()->route('ads.index')->with(['status'=>'success','message'=>'Success Create New Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('ads.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function show(ads $ads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['ad']=ads::find($id);
        return view('pages.edit.editAds',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function update(adsUpdateRequest $request, $id,adsServices $service)
    {
        $ads=$request->all();
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            if ($request->file('image')!=null) {
                //get file image
                $getImage=$request->file('image');
                //get extention image
                $getExtension=$getImage->getClientOriginalExtension();
                //set new name image
                $setNewName=time().'.'.$getExtension;
                /**upload then delete old image */
                $upload=Storage::putFileAs('public/ads',$getImage,$setNewName);
                Storage::delete($request->oldImage);

                $ads['image']=$upload;
            }else{
                $ads['image']=$request->oldImage;
            }
            $service->update($ads,$id);
            return redirect()->route('ads.index')->with(['status'=>'success','message'=>'Success Update Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('ads.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getImage=ads::find($id);
        try {
            if (ads::destroy($id)) {
                Storage::delete($getImage->image);
            }
            return redirect()->route('ads.index')->with(['status'=>'success','message'=>'Success delete Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('ads.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }
}
