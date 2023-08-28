<?php

namespace App\Models;

use App\User;
use App\Models\order;
use App\Models\bundle;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class completedOrder extends Model
{
    //use SoftDeletes;
    protected $fillable=['slug','order_id','bundle_id','printed_at','finished_at','author_id','approvor_id','status','faulty_couse','note'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function order()
    {
        return $this->belongsTo(order::class);
    }
    public function bundle()
    {
        return $this->belongsTo(bundle::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }
    public function approvor()
    {
        return $this->belongsTo(User::class,'approvor_id');
    }
}
