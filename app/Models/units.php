<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class units extends Model
{
    protected $fillable = [
        'u_name','u_img','u_last_lesson'
    ];
    
    public $timestamps = false;
}
