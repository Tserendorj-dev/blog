<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = "rates";
    protected $fillable = ['rate_name_mn', 'rate_name_jp','rate_value'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
