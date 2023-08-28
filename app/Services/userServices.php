<?php
namespace App\Services;

use Illuminate\Support\Facades\Hash;

use App\User;

class userServices
{
    protected function setVariables($data)
    {
        return[
            'name'=>$data['name'],
            'role_id'=>$data['role_id'],
            'email'=>$data['email'],
            'password'=>Hash::make(@$data['password'])
        ];
    }
    public function store($data)
    {
        User::create($this->setVariables($data));
    }
    public function update($data,$id)
    {
        User::find($id)->update($this->setVariables($data));
    }
}
