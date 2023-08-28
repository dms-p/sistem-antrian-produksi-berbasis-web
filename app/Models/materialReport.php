<?php

namespace App\Models;
use App\Models\material;

use Illuminate\Database\Eloquent\Model;

class materialReport extends Model
{
    protected $fillable=['order_id','material_id','qty'];
    public $timestamps=false;

    public function material()
    {
        return $this->belongsTo(material::class);
    }
}
