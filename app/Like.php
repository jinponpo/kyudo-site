<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    Public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
    
    Public function article(): BelongsTo
    {
        return $this->belongsTo('App\Article');
    }
}
