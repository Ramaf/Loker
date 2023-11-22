<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use Session;

class InfoController extends Controller
{
    public function index()
    {
        return view('admin.loker.index');
    }



    public function create()
    {
        return view('admin.loker.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'snk' => 'required',
            'kuota' => 'required',
        ]);

        $info = new Info();
        $info->judul = $request->judul;
        $info->deskripsi = $request->deskripsi;
        $info->snk = $request->snk;
        $info->kuota = $request->kuota;

        if (!$info->save()) {
            Session::flash('gagal', 'Yamaap, Info gagal disimpan!!');
            return redirect()->route('loker.create');
        }

        Session::flash('sukses', 'Yeahh, Info berhasil disimpan!');
        return redirect()->route('loker');

    }


    public function edit($id)
    {
        $info = Info::find($id);
        if (!$info) {
            return abort(404);
        }
        return view('info.edit')->with('info', $info)->with('info', $info);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:191',
        ]);

        $info = Info::find($id);
        $info->nama = $request->nama;
        $info->save();
        Session::flash('update', 'Info berhasil di update!');
        return redirect()->route('info');
    }

    public function destroy($id)
    {
        $info = Info::find($id);
        $info->delete();
        Session::flash('delete', 'Info berhasil dihapus!');
        return redirect()->route('info');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $info = Info::where("nama", "LIKE", "%$keyword%")->get();
        return $info;
    }
}
