<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loker;

class LokerController extends Controller
{
    public function index()
    {
        return view('admin.index');
        
    }



    public function create()
    {
        return view('loker.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'nama'=>'required',
        ]);

        $loker = new Loker();
        $loker->nama = $request->nama;

    	if(!$loker->save()){
            Session::flash('gagal','Yamaap, Loker gagal disimpan!!');
            return redirect()->route('loker');
        }

        Session::flash('sukses','Yeahh, Loker berhasil disimpan!');
        return redirect()->route('loker');

        return back()->withErrors(['nama.required', 'Namdde is required']);

    }


    public function edit($id)
    {
        $loker = Loker::find($id);
        if(!$loker){
            return abort(404);
        }
        return view('loker.edit')->with('loker', $loker)->with('loker', $loker);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:191',
        ]);

        $loker = Loker::find($id);
        $loker->nama = $request->nama;
        $loker->save();
        Session::flash('update','Loker berhasil di update!');
        return redirect()->route('loker');
    }

    public function destroy($id)
    {
        $loker = Loker::find($id);
            $loker->delete();
            Session::flash('delete','Loker berhasil dihapus!');
            return redirect()->route('loker');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $loker = Loker::where("nama", "LIKE", "%$keyword%")->get();
        return $loker;
    }

}
