@extends('layouts.master')
@section('title', 'Category')
@section('content')
<div class="x_content">
<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="{{  route('user.store')  }}" method="POST" enctype="multipart/form-data">
@csrf
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"  >Nama <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="nama" id="first-name" required="required" class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">umur <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" name="umur" id="last-name" name="last-name" required="required" class="form-control">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">nohp</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="middle-name" name="nohp" class="form-control" type="text" name="middle-name">
											</div>
										</div>
                                        <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">email</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="middle-name" name="email"class="form-control" type="text" name="middle-name">
											</div>
										</div>
                                        <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">ijazah</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="middle-name" name="ijazah" class="form-control" type="file" name="middle-name">
											</div>
										</div>
                                        <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">foto</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="middle-name" name="foto" class="form-control" type="file" name="middle-name">
											</div>
										</div>
                                        <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">lamaran</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="middle-name" name="lamaran" class="form-control" type="file" name="middle-name">
											</div>
										</div>
                                        <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">alamat</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="middle-name" name="alamat" class="form-control" type="text" name="middle-name">
											</div>
										</div>
                                        <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">password</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="middle-name" name="password" class="form-control" type="password" name="middle-name">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="date" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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