<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ads extends Model
{
    protected $fillable=['name','image'];
    public $timestamps=false;
}
