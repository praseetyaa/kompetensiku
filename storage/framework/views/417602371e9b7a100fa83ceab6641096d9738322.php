<!DOCTYPE html>
<html dir="ltr">

<head>
    <title>Registrasi | Campus Digital &#8211; The House of Professional Digital Marketing</title>
    <?php echo $__env->make('template/admin/_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('css-extra'); ?>
</head>

<body>
    <div class="main-wrapper">
        <?php echo $__env->make('template/admin/_preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><a href="/<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>"><img src="<?php echo e(asset('assets/images/logo/logo-white.png')); ?>" alt="logo" /></a></span>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" id="registrationform" action="/register" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white <?php echo e($errors->has('nama_lengkap') ? 'border-danger bg-danger' : 'bg-success'); ?>" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="nama_lengkap" class="form-control form-control-lg <?php echo e($errors->has('nama_lengkap') ? 'border-danger' : ''); ?>" value="<?php echo e(old('nama_lengkap')); ?>" placeholder="Nama Lengkap" aria-label="Nama Lengkap" aria-describedby="basic-addon1">
                                    <?php if($errors->has('nama_lengkap')): ?>
                                    <small class="form-row col-12 mt-1 text-danger"><?php echo e(ucfirst($errors->first('nama_lengkap'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white <?php echo e($errors->has('email') ? 'border-danger bg-danger' : 'bg-warning'); ?>" id="basic-addon2"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control form-control-lg <?php echo e($errors->has('email') ? 'border-danger' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2">
                                    <?php if($errors->has('email')): ?>
                                    <small class="form-row col-12 mt-1 text-danger"><?php echo e(ucfirst($errors->first('email'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white <?php echo e($errors->has('username') ? 'border-danger bg-danger' : 'bg-success'); ?>" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="username" class="form-control form-control-lg <?php echo e($errors->has('username') ? 'border-danger' : ''); ?>" value="<?php echo e(old('username')); ?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                    <?php if($errors->has('username')): ?>
                                    <small class="form-row col-12 mt-1 text-danger"><?php echo e(ucfirst($errors->first('username'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white <?php echo e($errors->has('password') ? 'border-danger bg-danger' : 'bg-warning'); ?>" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg <?php echo e($errors->has('password') ? 'border-danger' : ''); ?>" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                                    <?php if($errors->has('password')): ?>
                                    <small class="form-row col-12 mt-1 text-danger"><?php echo e(ucfirst($errors->first('password'))); ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <input type="hidden" name="ref" value="<?php echo e($_GET['ref']); ?>">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">Sign Up</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?php echo e(asset('templates/matrix-admin/assets/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(asset('templates/matrix-admin/assets/libs/popper.js/dist/umd/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('templates/matrix-admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    </script>

</body>

</html><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-referral/resources/views/auth/register.blade.php ENDPATH**/ ?>