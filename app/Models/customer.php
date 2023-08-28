<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer extends Model
{
    use SoftDeletes;
    protected $fillable=['name','image','slug','stock'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
