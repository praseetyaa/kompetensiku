<?php $__env->startSection('title', 'Registrasi | '); ?>

<?php $__env->startSection('content'); ?>

<!-- Info Section -->
<section class="info-section spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="info-text">
          	<!--<h4 class="mb-4">Registrasi</h4>-->
			<div class="card">
				<div class="card-header text-center">
					Form Registrasi
				</div>
				<div class="card-body">
					<form id="registration-form" method="post" action="/register">
					  <?php echo e(csrf_field()); ?>

					  <input type="hidden" name="id_sponsor" value="<?php echo e($user == null ? $default->id_user : $user->id_user); ?>">
					  <input type="hidden" name="ref" value="<?php echo e($user == null ? $default->username : $user->username); ?>">
					  <div class="alert alert-success text-center">
						<strong>Biaya Aktivasi:</strong><br><del>Rp. 499.000</del> Rp. <?php echo e(number_format(biayaAktivasi(),0,'.','.')); ?>

					  </div>
					  <div class="alert alert-warning text-center">
						<strong>Sponsor:</strong> <?php echo e($user == null ? $default->nama_user : $user->nama_user); ?>

					  </div>
					  <p class="h6 text-center font-weight-bold mb-3 mt-5">Identitas Pendaftar</p>
					  <div class="form-row">
						<div class="form-group col-md-6">
							<label>Nama Lengkap <span class="text-danger">*</span></label>
						  	<input type="text" name="nama_lengkap" class="form-control form-control-sm <?php echo e($errors->has('nama_lengkap') ? 'border-danger' : ''); ?>" value="<?php echo e(old('nama_lengkap')); ?>" placeholder="Masukkan Nama Lengkap">
							<?php if($errors->has('nama_lengkap')): ?>
							<div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('nama_lengkap'))); ?></div>
							<?php endif; ?>
						</div>
						<div class="form-group col-md-6">
							<label>Tanggal Lahir <span class="text-danger">*</span></label>
						  	<input type="text" name="tanggal_lahir" class="form-control form-control-sm <?php echo e($errors->has('tanggal_lahir') ? 'border-danger' : ''); ?>" value="<?php echo e(old('tanggal_lahir')); ?>" placeholder="Masukkan Tanggal Lahir (Format: yyyy-mm-dd)">
							<?php if($errors->has('tanggal_lahir')): ?>
							<div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('tanggal_lahir'))); ?></div>
							<?php endif; ?>
						</div>
						<div class="form-group col-md-6">
							<label>Jenis Kelamin <span class="text-danger">*</span></label>
						  	<div class="form-row">
								<div class="col-sm-6">
									<div class="form-check">
									  <input class="form-check-input" type="radio" name="jenis_kelamin" id="gender-1" value="L">
									  <label class="form-check-label" for="gender-1">
										Laki-Laki
									  </label>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-check">
									  <input class="form-check-input border-danger" type="radio" name="jenis_kelamin" id="gender-2" value="P">
									  <label class="form-check-label" for="gender-2">
										Perempuan
									  </label>
									</div>
								</div>
							</div>
							<?php if($errors->has('jenis_kelamin')): ?>
							<div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('jenis_kelamin'))); ?></div>
							<?php endif; ?>
						</div>
						<div class="form-group col-md-6">
							<label>Nomor HP <span class="text-danger">*</span></label>
						  	<input type="text" name="nomor_hp" class="form-control form-control-sm <?php echo e($errors->has('nomor_hp') ? 'border-danger' : ''); ?>" value="<?php echo e(old('nomor_hp')); ?>" placeholder="Masukkan Nomor HP">
							<?php if($errors->has('nomor_hp')): ?>
							<div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('nomor_hp'))); ?></div>
							<?php endif; ?>
						</div>
					  </div>
					  <p class="h6 text-center font-weight-bold mb-3 mt-5">Akun Pendaftar</p>
					  <div class="form-row">
						<div class="form-group col-md-6">
							<label>Email <span class="text-danger">*</span></label>
						  	<input type="email" name="email" class="form-control form-control-sm <?php echo e($errors->has('email') ? 'border-danger' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="Masukkan Email">
							<?php if($errors->has('email')): ?>
							<div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('email'))); ?></div>
							<?php endif; ?>
						</div>
						<div class="form-group col-md-6">
							<label>Username <span class="text-danger">*</span></label>
						  	<input type="text" name="username" class="form-control form-control-sm <?php echo e($errors->has('username') ? 'border-danger' : ''); ?>" value="<?php echo e(old('username')); ?>" placeholder="Masukkan Username">
							<?php if($errors->has('username')): ?>
							<div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('username'))); ?></div>
							<?php endif; ?>
						</div>
						<div class="form-group col-md-6">
						  	<label>Password <span class="text-danger">*</span></label>
						  	<input type="password" name="password" class="form-control form-control-sm <?php echo e($errors->has('password') ? 'border-danger' : ''); ?>" placeholder="Masukkan Password">
							<?php if($errors->has('password')): ?>
							<div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('password'))); ?></div>
							<?php endif; ?>
						</div>
						<div class="form-group col-md-6">
						  	<label>Ulangi Password <span class="text-danger">*</span></label>
						  	<input type="password" name="password_confirmation" class="form-control form-control-sm <?php echo e($errors->has('password') ? 'border-danger' : ''); ?>" placeholder="Ulangi Password">
						</div>
					  </div>
					</form>
				</div>
				<div class="card-footer text-right">
					<button type="submit" id="btn-submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i> Submit</button>
				</div>
			</div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Info Section end -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<script>
	// Datepicker
	$(document).ready(function(){
		$("input[name=tanggal_lahir]").datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});
	});
	
    // Button Submit
    $(document).on("click", "#btn-submit", function(e){
        $("#registration-form").submit();
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">
<style type="text/css">
  .header-section {background: #340369!important;}
  .info-section {margin-top: 126px!important;}
  #registration-form .h6:before, #registration-form .h6:after {content: '---';}
  label {font-size: .875rem;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/guest/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-campusdigital/resources/views/front/register.blade.php ENDPATH**/ ?>