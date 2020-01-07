<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = ['rate_name', 'rate_value', 'lang'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
