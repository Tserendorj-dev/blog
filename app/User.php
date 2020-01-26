<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //My code relation 2020/01/07
    public function posts()
    {
        //return $this->hasMany(Post::class);
        return $this->hasMany('App\Post', 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function isUserComment($post_id)
    {
        return Comment::where('post_id',$post_id)
                            ->where('user_id', auth()->user()->id)
                            ->first();
    }


    // public function isUserComment()
    // {
    //     return $this->hasManyThrough('App\Post', 'App\Comment','post_id','user_id','user_id','id');
    // }
}
