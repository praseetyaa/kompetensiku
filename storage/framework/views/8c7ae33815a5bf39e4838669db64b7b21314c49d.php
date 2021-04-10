<!DOCTYPE html>
<html lang="en">

<head>

  <?php echo $__env->make('template/admin/_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <title>Login Page | Sistem Rekruitmen Karyawan</title>

  <style type="text/css">
    body {height: calc(100vh); background-repeat: no-repeat; background-size: cover; background-position: center;}
    .wrapper {background: rgba(0,0,0,.3);}
    .card {width: 500px; background-color: rgba(0,0,0,.6);}
    .form-control, .form-control:focus {background-color: transparent; color: #fff;}
    .input-group .form-control {border-right-width: 0;}
    .input-group-append .btn {color: #fff; border: 1px solid #d1d3e2; border-left-width: 0; border-radius: 10rem;}
    .custom-checkbox .custom-control-label::before {background-color: transparent;}
  </style>

</head>

<body background="<?php echo e(asset('assets/images/background/admin.jpg')); ?>">

  <div class="wrapper h-100">
    <div class="d-flex justify-content-center h-100">
      <div class="card my-auto">
        <div class="card-body">
          <div class="text-center">
            <h1 class="h4 text-white mb-5">Welcome Back!</h1>
          </div>
          <?php if(isset($message)): ?>
          <div class="alert alert-danger">
            <?php echo e($message); ?>

          </div>
          <?php endif; ?>
          <form class="user" method="post" action="/login">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <input type="username" class="form-control form-control-user <?php echo e($errors->has('username') ? 'border-danger' : ''); ?>" name="username" placeholder="Masukkan Username..." value="<?php echo e(old('username')); ?>">
              <?php if($errors->has('username')): ?>
                <small class="text-danger"><?php echo e($errors->first('username')); ?></small>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <div class="input-group">
                <input type="password" class="form-control form-control-user <?php echo e($errors->has('password') ? 'border-danger' : ''); ?>" name="password" placeholder="Password">
                <div class="input-group-append">
                  <button class="btn btn-toggle-password show <?php echo e($errors->has('password') ? 'border-danger text-danger' : ''); ?>" type="button"><i class="fa fa-eye"></i></button>
                </div>
              </div>
              <?php if($errors->has('password')): ?>
                <small class="text-danger"><?php echo e($errors->first('password')); ?></small>
              <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-user btn-block">
              Login
            </button>
          </form>
          <hr>
        </div>
      </div>
    </div>
  </div>

  <?php echo $__env->make('template/admin/_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <script type="text/javascript">
    // Button toggle password
    $(document).on("click", ".btn-toggle-password", function(e){
      e.preventDefault();
      $(this).hasClass("show") ? $("input[name=password]").attr("type","text") : $("input[name=password]").attr("type","password");
      $(this).hasClass("show") ? $(this).find(".fa").removeClass("fa-eye").addClass("fa-eye-slash") : $(this).find(".fa").removeClass("fa-eye-slash").addClass("fa-eye");
      $(this).hasClass("show") ? $(this).removeClass("show").addClass("hide") : $(this).removeClass("hide").addClass("show");
    });
  </script>

</body>

</html>
<?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/auth/login.blade.php ENDPATH**/ ?>