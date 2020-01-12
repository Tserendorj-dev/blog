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
        $categories = Category::all();
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
            'is_visible' => 'max:1',
            'lang' => 'max:2',
        ]);
        
        // $new = new Category();
        // $new->parentmenu = $request->parentmenu;
        // $new->menulbl = $request->menulbl;
        // $new->hreflink = "www";
        // $new->order = 1;
        // $new->contentid = 1;
        // $new->isactive = 1;
        // $new->whois = Auth::user() -> id;
        // $new->save();

        $category = Category::create($validatedData);
        return redirect('/categories')->with('success', 'Шинэ бүлэг амжилттай нэмлээ.');;
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
            'is_visible' => 'max:1',
            'lang' => 'max:2',
        ]);

        Category::where('cat_id',$id)->update($validatedData);
        return redirect('/categories')->with('success', 'Бүлгийг амжилттай заслаа.');
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
        return redirect('/categories')->with('success', 'Бүлгийг амжилттай устгалаа.');
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
        return redirect('/categories')->with('success', 'Бүлгийг нийтлэхгүйгээр заслаа.');
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
        return redirect('/categories')->with('success', 'Бүлгийг нийтлэхээр заслаа.');
    }
}
