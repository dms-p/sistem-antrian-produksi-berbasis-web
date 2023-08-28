<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\service;

class order extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'invoice',
        'slug',
        'customer_id',
        'sale_id',
        'service_id',
        'qty',
        'failed_print',
        'surplus',
        'take_stock',
        'note',
        'statusOrder',
        'statusProcess',
        'date_inv'];
        public function getRouteKeyName()
        {
            return 'slug';
        }
        public function customer()
        {
            return $this->belongsTo(customer::class);
        }
        public function sales()
        {
            return $this->belongsTo(sales::class,'sale_id');
        }
        public function service()
        {
            return $this->belongsTo(service::class);
        }
        public function completedOrder()
        {
            return $this->hasOne(completedOrder::class);
        }
}
