<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rate;

class RateController extends Controller
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
        $rates = new Rate;
        $queries = [];

        $columns = [
            'rate_name_mn',
            'rate_name_jp',
            'rate_value'
        ];

        foreach($columns as $column){
            if(request()->has($column)){
                $rates = $rates->where($column,'like', '%'.request($column).'%');
                $queries[$column] = request($column);
            }
        }

        $rates = $rates->paginate(2)->appends($queries);
        return view('admin.rate.index',['ratesList' => $rates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rate.create');
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
            'rate_name_mn' => 'required|max:100',
            'rate_name_jp' => 'required|max:100',
            'rate_value' => 'max:3',
        ]);
        
        $rate = Rate::create($validatedData);
        return redirect('/rates')->with('success', '評価を登録しました。');;
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
        $rate = Rate::where('rate_id',$id)->first();
        return view('admin.rate.edit',['rate' => $rate]);
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
            'rate_name_mn' => 'required|max:100',
            'rate_name_jp' => 'required|max:100',
            'rate_value' => 'max:3',
        ]);

        Rate::where('rate_id',$id)->update($validatedData);
        $url = $request->redirects_to;
        return redirect($url)->with('success', '評価を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rate = Rate::where('rate_id',$id);
        $rate->delete();
        return back()->with('success', '評価を削除しました。');
    }
}
