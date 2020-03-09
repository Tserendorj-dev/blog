<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
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
        $categories = new Category;
        $queries = [];

        $columns = [
            'cat_name',
            'lang',
            'is_visible'
        ];

        foreach($columns as $column){
            if(request()->has($column)){
                $categories = $categories->where($column,'like', '%'.request($column).'%');
                $queries[$column] = request($column);
            }
        }

        $categories = $categories->paginate(10)->appends($queries);
        return view('admin.category.index',['catList' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cat_name' => 'required|max:255',
        ]);
        
        $new = new Category();
        $new->cat_name = $request->cat_name;
        $new->is_visible = $request->is_visible;
        $new->lang = $request->lang;
        $new->save();
        // $category = Category::create($validatedData);
        return redirect('/categories')->with('success', 'カテゴリーを登録しました。');;
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
        $category = Category::where('cat_id',$id)->first();
        return view('admin.category.edit',['category' => $category]);
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
            'cat_name' => 'required|max:255',
        ]);
        
        $update = Category::where('cat_id',$id)->first();
        $update->cat_name = $request->cat_name;
        $update->is_visible = $request->is_visible;
        $update->lang = $request->lang;
        $update->save();
        $url = $request->redirects_to;
        return redirect($url)->with('success', 'カテゴリーを更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('cat_id',$id);
        $category->delete();
        return back()->with('success', 'カテゴリーを削除しました。');
        //redirect('/categories')->with('success', 'Бүлгийг амжилттай устгалаа.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inVisible($id)
    {
        Category::where('cat_id',$id)->update(['is_visible' => 0]);
        return back()->with('success', 'カテゴリーを非表示にしました。');
        // return redirect('/categories')->with('success', 'Бүлгийг нийтлэхгүйгээр заслаа.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Visible($id)
    {
        Category::where('cat_id',$id)->update(['is_visible' => 1]);
        return back()->with('success', 'カテゴリーを表示にしました。');
    }
}
