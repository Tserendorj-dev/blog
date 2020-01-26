<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $req){
        $req->validate([
            'comment_text' => 'required|max:100',
        ]);

        //var_dump($req);

         $request = $req->all();
         $request['user_id'] = auth()->user()->id;
         Comment::create($request);

        return back();
    }
}
