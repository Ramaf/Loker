<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.User.index');
        
    }



    public function create()
    {
        return view('admin.User.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'nama'=>'required',
        ]);

        $user = new User();
        $user->nama = $request->nama;

    	if(!$user->save()){
            Session::flash('gagal','Yamaap, User gagal disimpan!!');
            return redirect()->route('user');
        }

        Session::flash('sukses','Yeahh, User berhasil disimpan!');
        return redirect()->route('user');

        return back()->withErrors(['nama.required', 'Namdde is required']);

    }


    public function edit($id)
    {
        $user = User::find($id);
        if(!$user){
            return abort(404);
        }
        return view('user.edit')->with('user', $user)->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:191',
        ]);

        $user = User::find($id);
        $user->nama = $request->nama;
        $user->save();
        Session::flash('update','User berhasil di update!');
        return redirect()->route('user');
    }

    public function destroy($id)
    {
        $user = User::find($id);
            $user->delete();
            Session::flash('delete','User berhasil dihapus!');
            return redirect()->route('user');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $user = User::where("nama", "LIKE", "%$keyword%")->get();
        return $user;
    }


}
