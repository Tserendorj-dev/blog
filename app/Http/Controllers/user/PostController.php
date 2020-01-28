<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Image;

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

    public function index(){
        $myList = Post::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->paginate(10);
        return view('user.post.index',['myList' => $myList]);
    }

    public function create(){
        $categories = Category::orderBy('cat_name','asc')->get();
        return view('user.post.create',['categories' => $categories]);
    }

    public function store(Request $req){
        
        $req->validate([
            'cat_id' => 'required',
            'title' => 'required|min:10|max:255',
            'pic_path' => 'image|required|mimes:jpeg,png,jpg,gif',
            'desc_text' => 'required|min:20|max:255',
            'full_text' => 'required|min:20',
        ]);
        
        $originalImage= $req->file('pic_path');
        $thumbnailImage = Image::make($originalImage);
        $originalPath = public_path().'/images/';
        $thumbnailImage->resize(500,347);
        $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName()); 
        
        $post = new Post;
        $post->cat_id = $req->cat_id;
        $post->user_id = auth()->user()->id;
        $post->title = $req->title;
        $post->pic_path = time().$originalImage->getClientOriginalName();
        $post->desc_text = $req->desc_text;
        $post->full_text = $req->full_text;
        $post->is_active = 0;
        $post->is_visible = 0;
        $post->views = 0;
        $post->lang = $req->lang;
        $post->save();
        return redirect(app()->getLocale().'/mypost');

    }

    public function edit($id){

        $myPost = Post::where('post_id',$id)->first();
        
        if($myPost->user_id!=auth()->user()->id){
            return redirect(app()->getLocale().'/mypost')->with('success', 'Error');
        }elseif($myPost->is_active==1){
            return redirect(app()->getLocale().'/mypost')->with('success', 'isActive');
        }else{
            $categories = Category::orderBy('cat_name','asc')->get();
            return view('user.post.edit',['myPost' => $myPost,'categories' => $categories]);
        }
    }

    public function update(Request $req)
    {
        $req->validate([
            'cat_id' => 'required',
            'title' => 'required|min:10|max:255',
            'desc_text' => 'required|min:20|max:255',
            'full_text' => 'required|min:20',
        ]);
        
        if ($req->hasFile('pic_path')) {
            // $this->validate($req, [
            //     'pic_path' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
            //  ]);
            $originalImage= $req->file('pic_path');
            $thumbnailImage = Image::make($originalImage);
            $originalPath = public_path().'/images/';
            $thumbnailImage->resize(500,347);
            $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
        }else{
            echo "Bhgui";
        }

        

        $post = Post::where('post_id',$req->post_id)->first();
        $post->cat_id = $req->cat_id;
        $post->title = $req->title;
        $post->desc_text = $req->desc_text;
        $post->full_text = $req->full_text;
        $post->lang = $req->lang;
        $post->save();

        return redirect(app()->getLocale().'/mypost');
    }

    public function destroy(Request $req)
    {
        $myPost = Post::where('post_id',$req->id)->first();
        
        if($myPost->user_id!=auth()->user()->id){
            return redirect(app()->getLocale().'/mypost')->with('success', 'Error');
        }elseif($myPost->is_active==1){
            return redirect(app()->getLocale().'/mypost')->with('success', 'isActive');
        }else{
            $myPost->delete();
            return redirect(app()->getLocale().'/mypost')->with('success', 'Deleted');
        }
    }
}
