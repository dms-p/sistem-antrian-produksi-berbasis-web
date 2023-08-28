<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Http\Requests\customerRequest;
use App\Http\Requests\customerUpdateRequest;
use App\Services\customerServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function __construct()
    {
        view()->share('title','Customer');
        view()->share('icon','fa-users');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['customers']=customer::paginate(12);
        return view('pages.index.indexCustomer', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create.createCustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(customerRequest $request, customerServices $service)
    {
        $customers=$request->all();
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        $getImage=$request->file('image');
        $getExtension=$getImage->getClientOriginalExtension();
        $setNewName=time().'.'.$getExtension;
        try {
            $upload=Storage::putFileAs('public/customer',$getImage,$setNewName);
            $customers['image']=$upload;
            $service->store($customers);
            return redirect()->route('customer.index')->with(['status'=>'success','message'=>'Success Create New Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('customer.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        $data['customer']=$customer;
        return view('pages.edit.editCustomer', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(customerUpdateRequest $request, customer $customer,customerServices $service)
    {
        $customers=$request->all();
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
                $upload=Storage::putFileAs('public/customer',$getImage,$setNewName);
                Storage::delete($request->oldImage);

                $customers['image']=$upload;
            }else{
                $customers['image']=$request->oldImage;
            }
            $service->update($customers,$customer->id);
            return redirect()->route('customer.index')->with(['status'=>'success','message'=>'Success Update Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('customer.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        $getImage=$customer->image;
        try {
            if (customer::destroy($customer->id)) {
                Storage::delete($getImage);
            }
            return redirect()->route('customer.index')->with(['status'=>'success','message'=>'Success delete Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('customer.index')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }
}
