<?php
namespace App\Services;

use Illuminate\Support\Facades\Hash;

use App\Models\materialOut;
use Illuminate\Support\Facades\Auth;

class materialOutServices
{
    protected function setVariables($data)
    {
        return[
            'material_id'=>$data['material_id'],
            'qty'=>$data['qty'],
            'date'=>serverDate($data['date']),
            "note"=>$data['note'],
            "user_id"=>Auth::user()->id
        ];
    }
    public function store($data)
    {
        materialOut::create($this->setVariables($data));
    }
    public function update($data,$id)
    {
        materialOut::find($id)->update($this->setVariables($data));
    }
}
