@extends('layouts.master')
@section('title', 'Category')
@section('content')
    <div class="x_content">
        <form id="demo-form2" class="form-horizontal form-label-left" action="{{ route('user.update', ['id' => $user->id]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('put') }}
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="nama" required="required" class="form-control "
                        value="{{ $user->nama }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">umur <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="number" name="umur" required="required" class="form-control"
                        value="{{ $user->umur }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">nohp</label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="nohp" class="form-control" type="number" value="{{ $user->nohp }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">email</label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="email" class="form-control" type="email" value="{{ $user->email }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">ijazah</label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="ijazah" class="form-control" type="file" value="{{ $user->ijazah }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Foto:</label>
                <div id="image-preview-foto" class="col-md-6 col-sm-6">
                    <label for="image-upload-foto" id="image-label-foto">Pilih Foto</label>
                    <input type="file" name="foto" id="image-upload-foto">
                    <p>
                        biarkan kosong jika tidak ingin mengganti foto.
                    </p>
                    @if (isset($user->foto) && filter_var($user->foto, FILTER_VALIDATE_URL))
                        <!-- Tampilkan foto jika URL foto valid -->
                        <img src="{{ $user->foto }}" alt="foto User"
                            style="max-width: 250px; margin-top: 10px;border-radius:10px;">
                    @else
                        <!-- Tampilkan foto default jika URL foto tidak valid atau kosong -->
                        <img src="{{ Storage::url($user->foto) }}" alt="Gambar Default"
                            style="max-width: 250px; margin-top: 10px;border-radius:10px;">
                    @endif
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Lamaran</label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="lamaran" class="form-control" type="file" value="{{ $user->lamaran }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">alamat</label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="alamat" class="form-control" type="text" value="{{ $user->alamat }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">password</label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="password" class="form-control" type="password" value="{{ $user->password }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="date" name="ttl"
                        required="required" onfocus="this.type='date'" onmouseover="this.type='date'"
                        onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)"
                        value="{{ $user->ttl }}">
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
                    <button href="{{ route('user.index') }}" class="btn btn-primary">Cancel</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

        </form>
    </div>

@endsection
@push('page-script')
    <script>
        function showPreviewFoto(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image-label-foto').text('Gambar Terpilih');
                    $('#image-preview-foto img').attr('src', e.target.result);
                    $('#image-preview-foto').show();
                    $('.custom-control').hide();
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                $('#image-label-foto').text('Pilih Gambar');
                $('#image-preview-foto img').attr('src', '');
                $('#image-preview-foto').hide();
                $('.custom-control .form-text').show();
            }
        }

        $("#image-upload-foto").change(function() {
            showPreviewFoto(this);
        });
    </script>
@endpush
