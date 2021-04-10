<?php $__env->startSection('content'); ?>

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
     <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Tambah Admin</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/list">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Admin</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- URL Referral -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-lg-12">
                <!-- card -->
                <div class="card shadow">
                    <h5 class="card-title border-bottom">Tambah Admin</h5>
                    <div class="card-body">
                        <form id="form" method="post" action="/admin/store" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Nama Admin <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_admin" class="form-control <?php echo e($errors->has('nama_admin') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('nama_admin')); ?>" placeholder="Masukkan Nama Admin">
                                    <?php if($errors->has('nama_admin')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('nama_admin'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <input type="text" name="username" class="form-control <?php echo e($errors->has('username') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('username')); ?>" placeholder="Masukkan Username">
                                    <?php if($errors->has('username')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('username'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="Masukkan Email">
                                    <?php if($errors->has('email')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('email'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('password')); ?>" placeholder="Masukkan Password">
                                    <?php if($errors->has('password')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('password'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Referral Code <span class="text-danger">*</span></label>
                                    <input type="text" name="referral_code" class="form-control <?php echo e($errors->has('referral_code') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('referral_code')); ?>" placeholder="Masukkan Referral Code">
                                    <?php if($errors->has('referral_code')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('referral_code'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Paket <span class="text-danger">*</span></label>
									<select name="paket" class="form-control <?php echo e($errors->has('paket') ? 'is-invalid' : ''); ?>">
										<option value="" disabled selected>--Pilih--</option>
										<?php $__currentLoopData = $paket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($data->id_paket); ?> <?php echo e($data->id_paket == old('id_paket') ? 'selected' : ''); ?>"><?php echo e($data->nama_paket); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
                                    <?php if($errors->has('paket')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('paket'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Foto Profil <span class="text-danger">*</span></label>
									<br>
                                    <input type="file" id="file" name="foto_profil" accept="image/*">
									<br>
									<img id="foto-profil" class="img-thumbnail mt-3">
                                    <?php if($errors->has('foto_profil')): ?>
									<div>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('foto_profil'))); ?></small>
									</div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="border-top">
                        <button id="btn-submit" type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- column -->
        </div>
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <?php echo $__env->make('template/admin/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script type="text/javascript">
	// Input Logo
    $(document).on("change", "#file", function(){
        readURL(this);
    });
	
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#foto-profil").attr("src", e.target.result);
				$("#foto-profil").fadeIn(1000);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Button Submit
    $(document).on("click", "#btn-submit", function(e){
        $("#form").submit();
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
    .border-top, .border-bottom {padding: 1.25rem;}
    .form-control {border-color: #caccce;}
	#foto-profil {display: none; max-width: 300px;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-referral/resources/views//user/admin/create-admin.blade.php ENDPATH**/ ?>