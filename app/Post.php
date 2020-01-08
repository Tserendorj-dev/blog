<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $fillable = ['title', 'pic_path', 'desc_text','full_text','is_visible','views','comments','lang'];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        // return $this->belongsTo(Category::class);
        // return $this->belongsTo('App\Category');
        return $this->belongsTo('App\Category', 'cat_id', 'cat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
