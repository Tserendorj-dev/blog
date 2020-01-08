<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ['cat_name', 'is_visible', 'lang'];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
