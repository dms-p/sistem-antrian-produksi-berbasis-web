<?php
namespace App\Services;

use App\Models\customer;
use Illuminate\Support\Str;
class customerServices
{
    protected function setVariables($data)
    {
        return[
            'name'=>$data['name'],
            'slug'=>Str::slug(Str::random(16)),
            'image'=>@$data['image']
        ];
    }
    public function store($data)
    {
        return customer::create($this->setVariables($data));
    }
    public function update($data,$id)
    {
        return customer::find($id)->update($this->setVariables($data));
    }
}
