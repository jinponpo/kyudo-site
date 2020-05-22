<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = [
        'title', 'body',
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
    
    public function likes(): HasMany
    {
        return $this->hasMany('App\Like');
    }
    
    Public function likedBy($user)
    {
        return Like::where('article_id', $this->id);
    }
}
