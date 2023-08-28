<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    protected $fillable=['name','stock','category_id','uom_id'];
    
    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function uom()
    {
        return $this->belongsTo(uom::class);
    }
}
