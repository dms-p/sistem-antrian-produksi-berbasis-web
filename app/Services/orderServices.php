<?php
namespace App\Services;

use App\Models\order;
use App\Models\uom;

class orderServices
{
    protected function setVariables($data)
    {
        return[
            'invoice'=>$data['invoice'],
            'slug'=>$data['slug'],
            'customer_id'=>$data['customer_id'],
            'sale_id'=>$data['sale_id'],
            'service_id'=>$data['service_id'],
            'qty'=>$data['qty'],
            'take_stock'=>$data['take_stock'],
            'surplus'=>$data['surplus'],
            'failed_print'=>$data['failed_print'],
            'note'=>$data['note'],
            'statusOrder'=>$data['statusOrder'],
            'statusProcess'=>$data['statusProcess'],
            'date_inv'=>date_format(date_create(serverDate($data['date_inv'])),'Y-m-d H:i:s')
        ];
    }
    public function store($data)
    {
        return order::create($this->setVariables($data));
    }
    public function update($data,$id)
    {
        return order::find($id)->update($this->setVariables($data));
    }
}
