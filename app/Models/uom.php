<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class uom extends Model
{
    use SoftDeletes;
    
    protected $fillable=['name'];
}
