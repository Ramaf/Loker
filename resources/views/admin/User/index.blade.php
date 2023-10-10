@extends('layouts.master')
@section('title', 'Category')
@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>umur</th>
                <th>nohp</th>
                <th>email</th>
                <th>ijazah</th>
                <th>foto</th>
                <th>lamaran</th>
                <th>alamat</th>
                <th>ttl</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftar_user as $no => $user)
                <tr role="row" class="even">
                    <td>
                        <center>
                            {{ ++$no + ($daftar_user->currentPage() - 1) * $daftar_user->perPage() }}
                        </center>
                    </td>
                    <td>{{ $user->nama }}
                    </td>
                    <td>{{ $user->umur }}</td>
                    <td>{{ $user->nohp }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ Storage::url($user->ijazah) }}" class="href" target="_blank">View Ijazah</a>
                    </td>
                    <td>
                        <img src="{{ Storage::url($user->foto) }}" alt="ijazah Default" style="width: 100px;">
                    </td>
                    <td>
                        <a href="{{ Storage::url($user->lamaran) }}" class="href" target="_blank">View Lamaran</a>
                    </td>
                    <td>{{ $user->alamat }}</td>
                    <td>{{ $user->ttl }}</td>
                    <td><a href="{{ route('user.edit', ['id'=>$user->id])}}" class="text-info">edit</a> || <a href="{{ route('user.destroy', ['id'=>$user->id])}}" class="text-danger">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
