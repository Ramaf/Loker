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
            'ijazah' => 'required|mimes:pdf',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
            'lamaran' => 'required|mimes:pdf',
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
        // $resizedImage2 = Image::make($ijazah);
        // $resizedImage3 = Image::make($lamaran);

        // Mendapatkan ekstensi dari file gambar
        $extension = $foto->getClientOriginalExtension();
        $extension2 = $ijazah->getClientOriginalExtension();
        $extension3 = $lamaran->getClientOriginalExtension();

        // Menamai gambar baru dengan timestamp dan ekstensi yang sama
        $foto = 'foto_' . time() . '.' . $extension;
        $lamaranFileName = 'ijazah_' . time() . '.' . $extension2;
        $ijazahFileName = 'lamaran_' . time() . '.' . $extension3;

        // Simpan gambar yang sudah diresize ke direktori storage/app/public/gambar
        Storage::disk('public')->put('gambar/' . $foto, $resizedImage->stream());
        $ijazah->storeAs('public/pdf', $ijazahFileName);
        $lamaran->storeAs('public/pdf', $lamaranFileName);
        // Buat instance dari model user
        $user = new User();
        $user->nama = $request->nama;
        $user->umur = $request->umur;
        $user->nohp = $request->nohp;
        $user->email = $request->email;
        $user->ijazah = 'pdf/' . $ijazahFileName;
        $user->foto = 'gambar/' . $foto;
        $user->lamaran = 'pdf/' . $lamaranFileName;
        $user->alamat = $request->alamat;
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
            'nama' => 'required',
            'umur' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'ijazah' => 'nullable|mimes:pdf',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'lamaran' => 'nullable|mimes:pdf',
            'alamat' => 'required',
            'password' => 'required',
            'ttl' => 'required',
        ]);

        $user = User::find($id);
        $user->nama = $request->nama;
        $user->umur = $request->umur;
        $user->nohp = $request->nohp;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->password = $request->password;
        $user->ttl = $request->ttl;

        // Cek apakah ada file baru diunggah untuk ijazah, jika tidak, gunakan file yang lama
        if ($request->hasFile('ijazah')) {
            // Hapus ijazah lama jika ada
            if ($user->ijazah && Storage::exists($user->ijazah)) {
                Storage::delete($user->ijazah);
            }

            // Simpan ijazah baru
            $ijazah = $request->file('ijazah')->store('public/pdf');
            $user->ijazah = $ijazah;
        }

        // Cek apakah ada file baru diunggah untuk foto, jika tidak, gunakan file yang lama
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto && Storage::exists($user->foto)) {
                Storage::delete($user->foto);
            }

            // Simpan foto baru
            $foto = $request->file('foto')->store('public/gambar');
            $user->foto = $foto;
        }

        // Cek apakah ada file baru diunggah untuk lamaran, jika tidak, gunakan file yang lama
        if ($request->hasFile('lamaran')) {
            // Hapus lamaran lama jika ada
            if ($user->lamaran && Storage::exists($user->lamaran)) {
                Storage::delete($user->lamaran);
            }

            // Simpan lamaran baru
            $lamaran = $request->file('lamaran')->store('public/pdf');
            $user->lamaran = $lamaran;
        }
        $user->save();
        Session::flash('update', 'User berhasil di update!');
        return redirect()->route('user.index');
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
