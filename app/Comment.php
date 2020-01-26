<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $primaryKey = 'comment_id';
    protected $fillable = ['post_id','user_id','rate_id','parent_id', 'comment_text', 'is_visible','lang'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        // return $this->belongsTo(Post::class);
        return $this->belongsTo('App\Post', 'post_id', 'post_id');
    }
    
    public function rate()
    {
        // return $this->belongsTo(Rate::class);
        return $this->hasOne('App\Rate', 'rate_id', 'rate_id');
    }

    public function child()
    {
        return $this->hasMany('App\Comment', 'parent_id', 'comment_id')->orderBy('created_at','asc');
    }

    public function commentSub($parentId)
    {
        return Comment::where('parent_id',$parentId)->orderBy('created_at','asc')->get();
    }

}
