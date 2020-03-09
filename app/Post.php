<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $primaryKey = 'post_id';
    protected $fillable = ['title', 'pic_path', 'desc_text','full_text','is_active','is_visible','views','lang'];

    public function commentsCount()
    {
        // return $this->hasMany(Comment::class);
        return $this->hasMany('App\Comment', 'post_id', 'post_id')->count();
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id', 'post_id')->where('parent_id',0)->orderBy('created_at','desc');
    }

    public function category()
    {
        // return $this->belongsTo(Category::class);
        return $this->belongsTo('App\Category', 'cat_id', 'cat_id');
        //return $this->belongsTo('App\Category');
    }

    public function user()
    {
        //return $this->belongsTo(User::class);
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    
}
