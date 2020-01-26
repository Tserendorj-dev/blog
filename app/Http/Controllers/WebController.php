<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class WebController extends Controller
{
    public function index()
    {
        $lastPosts = Post::latest()->limit(3)->get(); 
        return view('welcome',['lastPosts' => $lastPosts]);
    }
}
