<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
class completedOrderResource extends JsonResource
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
        $button='<a href="'.route('completed-order.show',$slug).'" class="btn btn-sm btn-success" target="__blank" ><i class="fa fa-eye"></i></a>';
        if ($role==2) {
            $button=$button.'<a href="'.route('completed-order.edit',$slug).'"class="btn btn-sm btn-warning text-white mr-2 ml-2"><i class="fas fa-pencil-alt"></i></a> <form action="'.route('completed-order.destroy',$slug).'" id="delete" method="post"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"> <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button></form>';
        }
        return '<div class="d-flex p-3" role="group">'.$button.'</div>';
    }
}
