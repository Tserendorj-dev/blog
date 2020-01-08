<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $fillable = ['parent_id', 'comment_text', 'is_visible','lang'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    public function rate()
    {
        return $this->belongsTo(Rate::class);
    }
}
