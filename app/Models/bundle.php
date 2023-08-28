<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bundle extends Model
{
    use SoftDeletes;
    protected $fillable=['name'];
    public function materials()
    {
        return $this->belongsToMany(material::class,'bundle_material');
    }
}
