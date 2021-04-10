

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
                <h4 class="page-title">Edit User</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/user">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
                    <h5 class="card-title border-bottom">Edit User</h5>
                    <div class="card-body">
                        <form id="form" method="post" action="/admin/user/update" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($user->id_user); ?>">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Nama User <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_user" class="form-control <?php echo e($errors->has('nama_user') ? 'is-invalid' : ''); ?>" value="<?php echo e($user->nama_user); ?>" placeholder="Masukkan Nama User">
                                    <?php if($errors->has('nama_user')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('nama_user'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input type="text" name="tanggal_lahir" class="form-control <?php echo e($errors->has('tanggal_lahir') ? 'border-danger' : ''); ?>" value="<?php echo e($user->tanggal_lahir); ?>" placeholder="Masukkan Tanggal Lahir (Format: yyyy-mm-dd)">
                                    <?php if($errors->has('tanggal_lahir')): ?>
                                    <div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('tanggal_lahir'))); ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                    <div class="form-row">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="jenis_kelamin" id="gender-1" value="L" <?php echo e($user->jenis_kelamin == 'L' ? 'checked' : ''); ?>>
                                              <label class="form-check-label" for="gender-1">
                                                Laki-Laki
                                              </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                              <input class="form-check-input border-danger" type="radio" name="jenis_kelamin" id="gender-2" value="P" <?php echo e($user->jenis_kelamin == 'P' ? 'checked' : ''); ?>>
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
                                    <input type="text" name="nomor_hp" class="form-control <?php echo e($errors->has('nomor_hp') ? 'border-danger' : ''); ?>" value="<?php echo e($user->nomor_hp); ?>" placeholder="Masukkan Nomor HP">
                                    <?php if($errors->has('nomor_hp')): ?>
                                    <div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('nomor_hp'))); ?></div>
                                    <?php endif; ?>
                                </div>
                                <?php if($user->is_admin == 1): ?>
                                <div class="form-group col-md-6">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <input type="text" name="username" class="form-control <?php echo e($errors->has('username') ? 'is-invalid' : ''); ?>" value="<?php echo e($user->username); ?>" placeholder="Masukkan Username">
                                    <?php if($errors->has('username')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('username'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <?php else: ?>
                                <input type="hidden" name="username" value="">
                                <?php endif; ?>
                                <div class="form-group col-md-6">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" value="<?php echo e($user->email); ?>" placeholder="Masukkan Email">
                                    <?php if($errors->has('email')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('email'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control <?php echo e($errors->has('password') ? 'border-danger' : ''); ?>" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <a href="#" class="input-group-text text-white <?php echo e($errors->has('password') ? 'border-danger bg-danger' : 'bg-success'); ?>" id="btn-toggle-password"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </div>
                                    <?php if($errors->has('password')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('password'))); ?></small>
                                    <?php else: ?>
                                    <small class="text-muted">Kosongi saja jika tidak ingin mengganti password.</small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Role <span class="text-danger">*</span></label>
									<select name="role" class="form-control <?php echo e($errors->has('role') ? 'is-invalid' : ''); ?>">
										<option value="" disabled selected>--Pilih--</option>
										<?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($data->id_role); ?>" <?php echo e($data->id_role == $user->role ? 'selected' : ''); ?> <?php echo e($user->is_admin != $data->is_admin ? 'disabled' : ''); ?>><?php echo e($data->nama_role); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
                                    <?php if($errors->has('role')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('role'))); ?></small>
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

<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<script type="text/javascript">
    // Button toggle password
    $(document).on("click", "#btn-toggle-password", function(e){
        e.preventDefault();
        if(!$(this).hasClass("show")){
            $("input[name=password]").attr("type","text");
            $(this).find(".fa").removeClass("fa-eye").addClass("fa-eye-slash");
            $(this).addClass("show");
        }
        else{
            $("input[name=password]").attr("type","password");
            $(this).find(".fa").removeClass("fa-eye-slash").addClass("fa-eye");
            $(this).removeClass("show");
        }
    });

    // Datepicker
    $(document).ready(function(){
        $("input[name=tanggal_lahir]").datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true
        });
    });

    // Button Submit
    $(document).on("click", "#btn-submit", function(e){
        $("#form").submit();
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">
<style type="text/css">
	#foto-profil {display: none; max-width: 300px;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/kompetensiku.id/public_html/bisa-v2/resources/views//user/admin/edit.blade.php ENDPATH**/ ?>