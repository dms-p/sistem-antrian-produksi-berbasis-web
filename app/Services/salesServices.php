<?php
namespace App\Services;

use App\Models\sales;

class salesServices
{
    protected function setVariables($data)
    {
        return[
            'name'=>$data['name'],
            'isActive'=>$data['isActive']
        ];
    }
    public function store($data)
    {
        return sales::create($this->setVariables($data));
    }
    public function update($data,$id)
    {
        return sales::find($id)->update($this->setVariables($data));
    }
}
