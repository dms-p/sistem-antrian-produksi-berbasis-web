<?php

namespace App\Http\Controllers;

use App\Http\Requests\rejectRequest;
use App\Models\completedOrder;

class rejectReportController extends Controller
{
    public function __construct()
    {
        view()->share('title','Reject Order report');
        view()->share('icon','fa-window-close');
    }
    
    public function show(completedOrder $order)
    {
        $data['order']=$order;
        return view('pages.show.showReject', $data);
    }
    public function edit(completedOrder $order)
    {
        $data['order']=$order;
        return view('pages.edit.editReject', $data);
    }
    public function update(rejectRequest $request,completedOrder $order)
    {
        if (isset($request->getMessages)) {
            return redirect()->back()->withErrors($request->getMessages->errors())->withInput();
        }
        try {
            completedOrder::find($order->id)->update(['note'=>$request->note,'status'=>'rejected']);
            return redirect()->route('message.show')->with(['status'=>'success','message'=>'Success Update Data!']);
        } catch (\Throwable $th) {
            return redirect()->route('message.show')->with(['status'=>'danger','message'=>$th->getMessage()]);
        }
    }
}
