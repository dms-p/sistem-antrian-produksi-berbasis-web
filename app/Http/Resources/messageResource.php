<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
class messageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'SO_number'=>$this->order->invoice,
            'Customer'=>$this->order->customer->name,
            'Sales'=>$this->order->sales->name,
            'QTY_Order'=>$this->order->qty,
            'finished_at'=>indoDate($this->finished_at),
            'status'=>$this->status,
            'action'=>$this->actionButton($this->slug)
        ];
    }
    protected function actionButton($slug)
    {
        $role=Auth::user()->role_id;
        if ($role==1) {
            return '<a href="'.route('completed-order.show',$slug).'" class="btn btn-sm btn-success" target="__blank" ><i class="fa fa-eye"></i></a>';
        } else {
            return '<a href="'.route('reject.show',$slug).'" class="btn btn-sm btn-success" target="__blank" ><i class="fa fa-eye"></i></a>';
        }
        
    }
}
