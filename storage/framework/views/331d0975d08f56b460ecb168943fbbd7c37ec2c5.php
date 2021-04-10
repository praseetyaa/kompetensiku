<!DOCTYPE html>
<html dir="ltr">

<head>
    <title>Recovery Password | Campus Digital &#8211; The House of Professional Digital Marketing</title>
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
            <div class="auth-box border-top border-secondary">
                <div id="loginform">
                    <div class="text-center">
						<?php if(Session::get('message')): ?>
						<div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
						<?php endif; ?>
                        <span class="text-white">Masukkan email Anda di bawah ini dan Kami akan mengirimi Anda instruksi untuk mengembalikan password Anda.</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <form class="col-12" method="post" action="/recovery-password">
							<?php echo e(csrf_field()); ?>

							<input type="hidden" name="referral" value="<?php echo e(Session::get('ref')); ?>">
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input type="text" name="email" class="form-control form-control-lg <?php echo e($errors->has('email') ? 'border-danger' : ''); ?>" placeholder="Alamat Email" aria-label="Username" aria-describedby="basic-addon1">
								<?php if($errors->has('email')): ?>
								<small class="form-row col-12 mt-1 text-danger"><?php echo e(ucfirst($errors->first('email'))); ?></small>
								<?php endif; ?>
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-warning" href="#" id="to-login" name="action">Kembali ke Login</a>
                                    <button class="btn btn-success float-right" type="submit">Recover</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        // $("#loginform").slideUp();
        // $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
		window.location.href = '/login';
        // $("#recoverform").hide();
        // $("#loginform").fadeIn();
    });
    </script>

    <style type="text/css">
        .auth-wrapper {background-color: #330369!important;}
        .auth-box {background-color: #451579!important; border-color: #fdd100!important;}
    </style>

</body>

</html><?php /**PATH /var/www/vhosts/psikologanda.com/laravel-akademi/resources/views/auth/recovery-password-form.blade.php ENDPATH**/ ?>