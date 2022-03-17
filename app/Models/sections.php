<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sections extends Model
{
    protected $fillable = [
        's_name','s_img','s_unit','s_last_lesson'
    ];

    public $timestamps = false;
}
