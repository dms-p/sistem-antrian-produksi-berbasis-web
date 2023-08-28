<?php
namespace App\Services;

use App\Models\uom;

class uomServices
{
    protected function setVariables($data)
    {
        return[
            'name'=>$data['name']
        ];
    }
    public function store($data)
    {
        return uom::create($this->setVariables($data));
    }
    public function update($data,$id)
    {
        return uom::find($id)->update($this->setVariables($data));
    }
}
