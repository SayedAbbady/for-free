<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class levels extends Model
{
    protected $fillable = [
        'l_name','l_img','l_section','l_is_free'
    ];

    public $timestamps = false;
}
