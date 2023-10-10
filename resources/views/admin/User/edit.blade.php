@extends('layouts.master')
@section('title', 'Category')
@section('content')
<div class="x_content">
        <form id="demo-form2" class="form-horizontal form-label-left" action="{{ route('user.update') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            {{ methode_field('put') }}
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="nama" required="required" class="form-control " value="{{$user->nama}}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">umur <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="number" name="umur" required="required" class="form-control" value="{{$user->umur}}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">nohp</label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="nohp" class="form-control" type="number" value="{{$user->nohp}}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">email</label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="email" class="form-control" type="email" value="{{$user->email}}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">ijazah</label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="ijazah" class="form-control" type="file" value="{{$user->ijazah}}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">foto</label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="foto" class="form-control" type="file" value="{{$user->foto}}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">lamaran</label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="lamaran" class="form-control" type="file" value="{{$user->lamaran}}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">alamat</label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="alamat" class="form-control" type="text" value="{{$user->alamat}}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">password</label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="password" class="form-control" type="password" value="{{$user->password}}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="date" name="ttl"
                        required="required" onfocus="this.type='date'" onmouseover="this.type='date'"
                        onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="{{$user->ttl}}">
                    <script>
                        function timeFunctionLong(input) {
                            setTimeout(function() {
                                input.type = 'text';
                            }, 60000);
                        }
                    </script>
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button class="btn btn-primary" type="button">Cancel</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

        </form>
    </div>

@endsection