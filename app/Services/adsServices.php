<?php
namespace App\Services;

use App\Models\ads;
class adsServices
{
    protected function setVariables($data)
    {
        return[
            'name'=>$data['name'],
            'image'=>$data['image']
        ];
    }
    public function store($data)
    {
        return ads::create($this->setVariables($data));
    }
    public function update($data,$id)
    {
        return ads::find($id)->update($this->setVariables($data));
    }
}
