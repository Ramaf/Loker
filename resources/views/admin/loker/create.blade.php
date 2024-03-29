@extends('layouts.master')
@section('title', 'Category')
@section('content')
    <div class="x_content">
        <form class="form-horizontal form-label-left" action="{{ route('loker.store') }}" method="POST">
            @csrf
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Loker <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="judul" required="required" class="form-control ">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Singkat<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="deskripsi" required="required" class="form-control ">
                </div>
            </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Syarat dan Ketentuan</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="alerts"></div>
                <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
                    <div class="btn-group">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                        </ul>
                    </div>
                    <div class="btn-group">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i
                                class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a data-edit="fontSize 5">
                                    <p style="font-size:17px">Huge</p>
                                </a>
                            </li>
                            <li>
                                <a data-edit="fontSize 3">
                                    <p style="font-size:14px">Normal</p>
                                </a>
                            </li>
                            <li>
                                <a data-edit="fontSize 1">
                                    <p style="font-size:11px">Small</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                        <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                        <a class="btn" data-edit="strikethrough" title="Strikethrough"><i
                                class="fa fa-strikethrough"></i></a>
                        <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i
                                class="fa fa-underline"></i></a>
                    </div>
                    <div class="btn-group">
                        <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i
                                class="fa fa-list-ul"></i></a>
                        <a class="btn" data-edit="insertorderedlist" title="Number list"><i
                                class="fa fa-list-ol"></i></a>
                        <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i
                                class="fa fa-dedent"></i></a>
                        <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                    </div>
                    <div class="btn-group">
                        <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i
                                class="fa fa-align-left"></i></a>
                        <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i
                                class="fa fa-align-center"></i></a>
                        <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i
                                class="fa fa-align-right"></i></a>
                        <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i
                                class="fa fa-align-justify"></i></a>
                    </div>
                </div>
                <div id="editor-one" class="editor-wrapper placeholderText" contenteditable="true" name="snk"></div>
                <textarea name="snk" id="descr" ></textarea>
                <br>
                <div class="ln_solid"></div>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">kuota<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="number" name="kuota" required="required" class="form-control ">
            </div>
        </div>
        <div class="ln_solid"></div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
        </form>
        </div>
    @endsection


    @push('page-script')
<script>
    // Ambil elemen-elemen
var editor = document.getElementById("editor-one");
var textarea = document.getElementById("descr");

// Tambahkan event listener untuk memantau perubahan pada editor
editor.addEventListener("input", function() {
    // Setel nilai textarea dengan nilai editor
    textarea.value = editor.innerHTML;
});
</script>
    @endpush

