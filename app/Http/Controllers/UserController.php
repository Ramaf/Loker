<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $daftar_user = User::paginate();
        $count = User::count();

        return view('admin.user.index', compact('daftar_user',));
    }



    public function create()
    {
        return view('admin.User.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama' => 'required',
            'umur' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'ijazah' => 'required|image|mimes:jpeg,png,jpg,gif',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
            'lamaran' => 'required|image|mimes:jpeg,png,jpg,gif',
            'alamat' => 'required',
            'password' => 'required',
            'ttl' => 'required',
        ]);
        // Mengambil file gambar dari request
        $ijazah = $request->file('ijazah');
        $foto = $request->file('foto');
        $lamaran = $request->file('lamaran');

        // Resize gambar menjadi ukuran yang diinginkan, contoh 400x300 pixels
        $resizedImage = Image::make($foto);
        $resizedImage2 = Image::make($ijazah);
        $resizedImage3 = Image::make($lamaran);

        // Mendapatkan ekstensi dari file gambar
        $extension = $foto->getClientOriginalExtension();
        $extension2 = $ijazah->getClientOriginalExtension();
        $extension3 = $lamaran->getClientOriginalExtension();

        // Menamai gambar baru dengan timestamp dan ekstensi yang sama
        $foto = 'foto_' . time() . '.' . $extension;
        $lamaran = 'lamaran_' . time() . '.' . $extension2;
        $ijazah = 'ijazah_' . time() . '.' . $extension3;

        // Simpan gambar yang sudah diresize ke direktori storage/app/public/gambar
        Storage::disk('public')->put('gambar/' . $foto, $resizedImage->stream());
        Storage::disk('public')->put('gambar/' . $ijazah, $resizedImage2->stream());
        Storage::disk('public')->put('gambar/' . $lamaran, $resizedImage3->stream());
        // Buat instance dari model Blog
        $user = new User();
        $user->nama = $request->nama;
        $user->umur = $request->umur;
        $user->nohp = $request->nohp; // Simpan path gambar ke dalam database
        $user->email = $request->email;
        $user->ijazah = 'gambar/' . $ijazah;
        $user->foto = 'gambar/' . $foto;
        $user->lamaran = 'gambar/' . $lamaran;
        $user->alamat = $request->alamat; // Simpan path gambar ke dalam database
        $user->password = $request->password;
        $user->ttl = $request->ttl;;

        // Simpan data user ke database
        if (!$user->save()) {
            Session::flash('gagal', 'Yamaap, user/Post gagal disimpan!!');
            return redirect()->route('user.create');
        }

        Session::flash('sukses', 'Yeahh, user berhasil disimpan!');
        return redirect()->route('user.index');
    }


    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return abort(404);
        }
        return view('admin.user.edit')->with('user', $user)->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:191',
        ]);

        $user = User::find($id);
        $user->nama = $request->nama;
        $user->save();
        Session::flash('update', 'User berhasil di update!');
        return redirect()->route('user');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('delete', 'User berhasil dihapus!');
        return redirect()->route('user.index');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $user = User::where("nama", "LIKE", "%$keyword%")->get();
        return $user;
    }
}
