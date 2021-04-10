

<?php $__env->startSection('title', 'Registrasi | '); ?>

<?php $__env->startSection('content'); ?>

<!-- bradcam_area_start -->
 <div class="bradcam_area breadcam_bg overlay" style="background-image: url('<?php echo e(asset('assets/images/others/slider-1.jpg')); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Registrasi</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end -->

	<!-- Start Sample Area -->
	<section class="sample-text-area">
		<div class="container box_1170">
            <div class="card shadow">
                <div class="card-body">
                    <form id="registration-form" method="post" action="/register">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="id_sponsor" value="<?php echo e($user == null ? $default->id_user : $user->id_user); ?>">
                        <input type="hidden" name="ref" value="<?php echo e($user == null ? $default->username : $user->username); ?>">
                        <div class="alert alert-success text-center m-0 mb-3">
                            <strong>Biaya Aktivasi:</strong><br>
                            <del>Rp. 999.000</del><br>
                            <h5>Rp. <?php echo e(number_format(get_biaya_aktivasi(),0,'.','.')); ?></h5>
                        </div>
                        <div class="alert alert-warning text-center m-0 mb-3">
                            <strong>Sponsor:</strong> <?php echo e($user == null ? $default->nama_user : $user->nama_user); ?>

                        </div>
                        <p class="h6 text-center font-weight-bold mb-3 mt-5">Identitas Pendaftar</p>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap" class="form-control form-control-sm <?php echo e($errors->has('nama_lengkap') ? 'border-danger' : ''); ?>" value="<?php echo e(old('nama_lengkap')); ?>" placeholder="Masukkan Nama Lengkap">
                                <?php if($errors->has('nama_lengkap')): ?>
                                <div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('nama_lengkap'))); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="text" name="tanggal_lahir" class="form-control form-control-sm <?php echo e($errors->has('tanggal_lahir') ? 'border-danger' : ''); ?>" value="<?php echo e(old('tanggal_lahir')); ?>" placeholder="Masukkan Tanggal Lahir (Format: yyyy-mm-dd)">
                                <?php if($errors->has('tanggal_lahir')): ?>
                                <div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('tanggal_lahir'))); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                <div class="form-row">
                                    <div class="col-sm-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="gender-1" value="L" <?php echo e(old('jenis_kelamin') == 'L' ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="gender-1">
                                            Laki-Laki
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-check">
                                            <input class="form-check-input border-danger" type="radio" name="jenis_kelamin" id="gender-2" value="P" <?php echo e(old('jenis_kelamin') == 'P' ? 'checked' : ''); ?>>
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
                            <div class="form-group col-md-12">
                                <label>Nomor HP <span class="text-danger">*</span></label>
                                <input type="text" name="nomor_hp" class="form-control form-control-sm <?php echo e($errors->has('nomor_hp') ? 'border-danger' : ''); ?>" value="<?php echo e(old('nomor_hp')); ?>" placeholder="Masukkan Nomor HP">
                                <?php if($errors->has('nomor_hp')): ?>
                                <div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('nomor_hp'))); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <p class="h6 text-center font-weight-bold mb-3 mt-5">Akun Pendaftar</p>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control form-control-sm <?php echo e($errors->has('email') ? 'border-danger' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="Masukkan Email">
                                <?php if($errors->has('email')): ?>
                                <div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('email'))); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Username <span class="text-danger">*</span></label>
                                <input type="text" name="username" class="form-control form-control-sm <?php echo e($errors->has('username') ? 'border-danger' : ''); ?>" value="<?php echo e(old('username')); ?>" placeholder="Masukkan Username">
                                <?php if($errors->has('username')): ?>
                                <div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('username'))); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control form-control-sm <?php echo e($errors->has('password') ? 'border-danger' : ''); ?>" placeholder="Masukkan Password">
                                <?php if($errors->has('password')): ?>
                                <div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('password'))); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-12">
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
	</section>
	<!-- End Sample Area -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<script>
	// Datepicker
	$(document).ready(function(){
		$("input[name=tanggal_lahir]").datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true,
			todayHighlight: true,
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
  #registration-form .h6:before, #registration-form .h6:after {content: '---';}
  .form-control {height: auto!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/guest/br/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/kompetensiku.id/public_html/bisa-v2/resources/views/front/br/register.blade.php ENDPATH**/ ?>