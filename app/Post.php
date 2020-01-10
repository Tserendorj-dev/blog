<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $fillable = ['title', 'pic_path', 'desc_text','full_text','is_active','is_visible','views','lang'];

    public function comments()
    {
        // return $this->hasMany(Comment::class);
        return $this->hasMany('App\Comment', 'post_id', 'post_id');
    }

    public function category()
    {
        // return $this->belongsTo(Category::class);
        return $this->belongsTo('App\Category', 'cat_id', 'cat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
