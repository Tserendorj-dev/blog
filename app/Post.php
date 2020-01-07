<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'pic_path', 'desc_text','full_text','is_visible','views','comments','lang'];

    public function comments()
    {
        return $this->hasMany(Post::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
