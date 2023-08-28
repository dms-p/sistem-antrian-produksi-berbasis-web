<?php
namespace App\Services;

use Illuminate\Support\Facades\Hash;

use App\Models\materialOpname;
use  Illuminate\Support\Facades\Auth;

class materialOpnameServices
{
    protected function setVariables($data)
    {
        return[
            'material_id'=>$data['material_id'],
            'qty'=>$data['qty'],
            'date'=>serverDate($data['date']),
            'note'=>$data['note'],
            "user_id"=>Auth::user()->id
        ];
    }
    public function store($data)
    {
        materialOpname::create($this->setVariables($data));
    }
    public function update($data,$id)
    {
        materialOpname::find($id)->update($this->setVariables($data));
    }
}
