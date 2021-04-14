@extends('template/guest/main')

@section('title', 'Daftar | ')

@section('content')

<!-- Info Section -->
<section class="info-section my-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="info-text">
          	<!--<h4 class="mb-4">Registrasi</h4>-->
			<div class="card rounded-1 border-0 shadow-sm">
				<div class="card-header bg-transparent mx-3 px-0 py-3 text-center">
					<img src="{{ asset('assets/images/logo/'.get_logo()) }}" width="170" class="mb-3">
					<h5>Form Registrasi</h5>
				</div>
				<form id="registration-form" method="post" action="/register">
					<div class="card-body">
						  {{ csrf_field() }}
						  <input type="hidden" name="id_sponsor" value="{{ $user == null ? $default->id_user : $user->id_user }}">
						  <input type="hidden" name="ref" value="{{ $user == null ? $default->username : $user->username }}">
						  <!-- <div class="col-12 mb-3 text-center">
							<a href="{{ asset('assets/docs/TUTORIAL PENDAFTARAN MEMBER CAMPUS DIGITAL.pdf') }}" target="_blank" class="btn btn-theme-1"><i class="fa fa-download mr-2"></i> Download Tutorial Pendaftaran Member Kompetensiku</a>
						  </div> -->
						  <div class="alert alert-success text-center">
							<strong>Biaya Aktivasi:</strong><br><del class="h5 text-danger">Rp. 799.000</del><br><span class="h4">Rp. {{ number_format(get_biaya_aktivasi(),0,'.','.') }}</span>
						  </div>
						  <div class="alert alert-warning text-center">
							<strong>Sponsor:</strong> {{ $user == null ? $default->nama_user : $user->nama_user }}
						  </div>
						  <p class="h6 text-center font-weight-bold mb-3 mt-5">Identitas Pendaftar</p>
						  <div class="form-row">
							<div class="form-group col-md-12">
								<label>Nama Lengkap <span class="text-danger">*</span></label>
								<input type="text" name="nama_lengkap" class="form-control form-control-sm {{ $errors->has('nama_lengkap') ? 'border-danger' : '' }}" value="{{ old('nama_lengkap') }}" placeholder="Masukkan Nama Lengkap">
								@if($errors->has('nama_lengkap'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('nama_lengkap')) }}</div>
								@endif
							</div>
							<div class="form-group col-md-12">
								<label>Tanggal Lahir <span class="text-danger">*</span></label>
								<input type="text" name="tanggal_lahir" class="form-control form-control-sm {{ $errors->has('tanggal_lahir') ? 'border-danger' : '' }}" value="{{ old('tanggal_lahir') }}" placeholder="Masukkan Tanggal Lahir (Format: dd/mm/yyyy)">
								@if($errors->has('tanggal_lahir'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('tanggal_lahir')) }}</div>
								@endif
							</div>
							<div class="form-group col-md-12">
								<label>Jenis Kelamin <span class="text-danger">*</span></label>
								<div class="form-row">
									<div class="col-sm-12">
										<div class="form-check">
										  <input class="form-check-input" type="radio" name="jenis_kelamin" id="gender-1" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}>
										  <label class="form-check-label" for="gender-1">
											Laki-Laki
										  </label>
										</div>
										<div class="form-check">
										  <input class="form-check-input border-danger" type="radio" name="jenis_kelamin" id="gender-2" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
										  <label class="form-check-label" for="gender-2">
											Perempuan
										  </label>
										</div>
									</div>
								</div>
								@if($errors->has('jenis_kelamin'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('jenis_kelamin')) }}</div>
								@endif
							</div>
							<div class="form-group col-md-12">
								<label>Nomor HP <span class="text-danger">*</span></label>
								<input type="text" name="nomor_hp" class="form-control form-control-sm {{ $errors->has('nomor_hp') ? 'border-danger' : '' }}" value="{{ old('nomor_hp') }}" placeholder="Masukkan Nomor HP">
								@if($errors->has('nomor_hp'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('nomor_hp')) }}</div>
								@endif
							</div>
						  </div>
						  <p class="h6 text-center font-weight-bold mb-3 mt-5">Akun Pendaftar</p>
						  <div class="form-row">
							<div class="form-group col-md-12">
								<label>Email <span class="text-danger">*</span></label>
								<input type="email" name="email" class="form-control form-control-sm {{ $errors->has('email') ? 'border-danger' : '' }}" value="{{ old('email') }}" placeholder="Masukkan Email">
								@if($errors->has('email'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('email')) }}</div>
								@endif
							</div>
							<div class="form-group col-md-12">
								<label>Username <span class="text-danger">*</span></label>
								<input type="text" name="username" class="form-control form-control-sm {{ $errors->has('username') ? 'border-danger' : '' }}" value="{{ old('username') }}" placeholder="Masukkan Username">
								@if($errors->has('username'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('username')) }}</div>
								@endif
							</div>
							<div class="form-group col-md-12">
								<label>Password <span class="text-danger">*</span></label>
								<input type="password" name="password" class="form-control form-control-sm {{ $errors->has('password') ? 'border-danger' : '' }}" placeholder="Masukkan Password">
								@if($errors->has('password'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('password')) }}</div>
								@endif
							</div>
							<div class="form-group col-md-12">
								<label>Ulangi Password <span class="text-danger">*</span></label>
								<input type="password" name="password_confirmation" class="form-control form-control-sm {{ $errors->has('password') ? 'border-danger' : '' }}" placeholder="Ulangi Password">
							</div>
						  </div>
					</div>
					<div class="card-footer bg-transparent mx-3 px-0 py-3 text-right">
						<button type="submit" id="btn-submit" class="btn btn-theme-1"><i class="fa fa-check mr-1"></i> Kirim</button>
					</div>
				</form>
			</div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Info Section end -->

@endsection

@section('js-extra')

<script src="{{ asset('templates/matrix-admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
	// Datepicker
	$(document).ready(function(){
		$("input[name=tanggal_lahir]").datepicker({
			format: 'dd/mm/yyyy',
			todayHighlight: true,
			autoclose: true,
		});
	});
	
    // Button Submit
    $(document).on("click", "#btn-submit", function(e){
        $("#registration-form").submit();
    });
</script>

@endsection

@section('css-extra')

<link href="{{ asset('templates/matrix-admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<style type="text/css">
  #registration-form .h6:before, #registration-form .h6:after {content: '---';}
</style>

@endsection