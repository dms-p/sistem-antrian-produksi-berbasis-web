<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class materialOpname extends Model
{
    protected $fillable=['material_id','date','qty','note',"user_id"];
    public function material()
    {
        return $this->belongsTo(material::class);
    }
}
