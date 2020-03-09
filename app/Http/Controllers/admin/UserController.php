<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
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
        $users = new User;
        $queries = [];

        $columns = [
            'name',
            'email',
            'level'
        ];

        foreach($columns as $column){
            if(request()->has($column)){
                $users = $users->where($column,'like', '%'.request($column).'%');
                $queries[$column] = request($column);
            }
        }

        $users = $users->orderBy('level','asc')->paginate(15)->appends($queries);
        return view('admin.user.index',['usersList' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name' => 'required|max:30',
            'email' => 'required|max:50',
            'password' => 'required|min:8|max:20',
            'level' => 'max:1',
        ]);
        
        $newUser =  new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->level = $request->level;
        $newUser->password = bcrypt($request->password);
        $newUser->save();
        return redirect('/users')->with('success', 'ユーザーを登録しました。');;
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
        $user = User::find($id);
        return view('admin.user.edit',['user' => $user]);
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
            'name' => 'required|max:30',
            'email' => 'required|max:50',
            'level' => 'max:1',
        ]);

        User::where('id',$id)->update($validatedData);
        $url = $request->redirects_to;
        return redirect($url)->with('success', 'ユーザーを更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id',$id);
        $user->delete();
        return back()->with('success', 'ユーザーを削除しました。');
    }
}
