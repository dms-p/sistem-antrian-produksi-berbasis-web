<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class orderResource extends JsonResource
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
            'SO_number'=>$this->invoice,
            'Customer'=>$this->customer->name,
            'qty'=>$this->qty,
            'date_inv'=>indoDate($this->date_inv),
            'status'=>$this->statusProcess,
            'action'=>$this->actionButton($this->slug)
        ];
    }
    protected function actionButton($slug)
    {
        $role=1;
        $button='<a href="'.route('order.show',$slug).'" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>';
        if ($role==1) {
            $button=$button.'<a href="'.route('order.edit',$slug).'" class="btn btn-sm btn-warning text-white mr-2 ml-2"><i class="fas fa-pencil-alt"></i></a> <form action="'.route('order.destroy',$slug).'" id="delete" method="post"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"> <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button></form>';
        }
        return '<div class="d-flex p-3" role="group">'.$button.'</div>';
    }
}
