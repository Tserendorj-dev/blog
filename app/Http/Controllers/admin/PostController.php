<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Post;

class PostController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name','asc')->get();
        $categories = Category::orderBy('cat_name','asc')->get();
        
        $posts = new Post;
        $queries = [];

        $columns = [
            'cat_id',
            'user_id',
            'title',
            'lang'
        ];

        foreach($columns as $column){
            if(request()->has($column)){
                $posts = $posts->where($column,'like', '%'.request($column).'%');
                $queries[$column] = request($column);
            }
        }

        $posts = $posts->paginate(15)->appends($queries);
        return view('admin.post.index',['postsList' => $posts,'users' => $users,'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::orderBy('name','asc')->get();
        $categories = Category::orderBy('cat_name','asc')->get();

        $post = Post::where('post_id',$id)->first();
        return view('admin.post.edit',['post' => $post,'users' => $users, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cat_id' => 'required|max:4',
            'title' => 'required|max:255',
            'desc_text' => 'required',
            'full_text' => 'required',
        ]);
        
        $new = Post::where('post_id',$id)->first();
        $new->cat_id = $request->cat_id;
        $new->title = $request->title;
        $new->desc_text = $request->desc_text;
        $new->full_text = $request->full_text;
        $new->lang = $request->lang;
        $new->save();
        $url = $request->redirects_to;
        return redirect($url)->with('success', '記事を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inVisible($id)
    {
        Post::where('post_id',$id)->update(['is_visible' => 0]);
        return back()->with('success', '記事を非表示にしました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Visible($id)
    {
        Post::where('post_id',$id)->update(['is_visible' => 1]);
        return back()->with('success', '記事を表示にしました。');
    }
}
