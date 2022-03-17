<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lessons extends Model
{
  protected $fillable = [
    'l_name','l_words','l_video','l_notes','l_sentens','l_rec','l_quiz','l_game','l_rate','l_level','l_live'
  ];

  public $timestamps = false;
}
