<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
        
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
            'umur'=>'required',
            'nohp'=>'required',
            'email'=>'required',
            'ijazah'=>'required |image|mines:jpeg,jpg',
            'foto'=>'required |image|mines:jpeg,jpg',
            'lamaran'=>'required |image|mines:jpeg,jpg',
            'alamat'=>'required',
            'password'=>'required',
            'ttl'=>'required',
        ]);
        // Mengambil file gambar dari request
        $image = $request->file('gambar');

        // Resize gambar menjadi ukuran yang diinginkan, contoh 400x300 pixels
        $resizedImage = Image::make($image)->fit(400, 300);

        // Mendapatkan ekstensi dari file gambar
        $extension = $image->getClientOriginalExtension();

        // Menamai gambar baru dengan timestamp dan ekstensi yang sama
        $imageName = time() . '.' . $extension;

        // Simpan gambar yang sudah diresize ke direktori storage/app/public/gambar
        Storage::disk('public')->put('gambar/' . $imageName, $resizedImage->stream());
        // Buat instance dari model Blog
        $user = new User();
        $user->nama = $request->nama;
        $user->umur = $request->umur;
        $user->nohp = $request->nohp; // Simpan path gambar ke dalam database
        $user->email = $request->email;
        $user->ijazah = 'gambar/' . $imageName;
        $user->foto = 'gambar/' . $imageName;
        $user->lamaran = 'gambar/' . $imageName;
        $user->alamat = $request->alamat; // Simpan path gambar ke dalam database
        $user->password = $request->password;
        $user->ttl = $request->ttl;;

        // Simpan data user ke database
        if (!$user->save()) {
            Session::flash('gagal', 'Yamaap, user/Post gagal disimpan!!');
            return redirect()->route('user');
        }

        Session::flash('sukses', 'Yeahh, user berhasil disimpan!');
        return redirect()->route('admin.user');
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
