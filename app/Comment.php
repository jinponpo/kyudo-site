<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    Public function user()
  {
    return $this->belongsTo('App\User');
  }

  Public function article()
  {
    return $this->belongsTo('App\Article');
  }
}
