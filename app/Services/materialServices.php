<?php
namespace App\Services;

use App\Models\material;


class materialServices
{
    protected function setVariables($data)
    {
        return[
            'name'=>$data['name'],
            'category_id'=>$data['category_id'],
            'stock'=>$data['stock'],
            'uom_id'=>$data['uom_id']
        ];
    }
    public function store($data)
    {
        return material::create($this->setVariables($data));
    }
    public function update($data,$id)
    {
        return material::find($id)->update($this->setVariables($data));
    }
}
