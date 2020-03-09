<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $primaryKey = 'cat_id';
    protected $fillable = ['cat_name', 'is_visible', 'lang'];
    
    public function posts()
    {
        // return $this->hasMany(Post::class);
        // return $this->hasMany('App\Post');
        return $this->hasMany('App\Post', 'cat_id', 'cat_id');
    }
}
