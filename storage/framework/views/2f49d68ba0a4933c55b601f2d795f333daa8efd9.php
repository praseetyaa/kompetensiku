<!DOCTYPE html>
<html lang="en">

<head>

  <?php echo $__env->make('template/applicant/_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <title>Login Page | Sistem Rekruitmen Karyawan</title>

  <style type="text/css">
    body {height: calc(100vh); background-repeat: no-repeat; background-size: cover; background-position: center;}
    .wrapper {background: rgba(0,0,0,.3);}
    .card {width: 500px; background-color: rgba(0,0,0,.6);}
    .form-control, .form-control:focus {background-color: transparent; color: #fff;}
    .custom-checkbox .custom-control-label::before {background-color: transparent;}
  </style>

</head>

<body background="<?php echo e(asset('assets/images/background/applicant.jpg')); ?>">

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
          <form class="user" method="post" action="/applicant/login">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <input type="text" class="form-control form-control-user <?php echo e($errors->has('username') ? 'border-danger' : ''); ?>" name="username" placeholder="Masukkan Username..." value="<?php echo e(old('username')); ?>">
              <?php if($errors->has('username')): ?>
                <small class="text-danger"><?php echo e($errors->first('username')); ?></small>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-user <?php echo e($errors->has('password') ? 'border-danger' : ''); ?>" name="password" placeholder="Password">
              <?php if($errors->has('password')): ?>
                <small class="text-danger"><?php echo e($errors->first('password')); ?></small>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox small">
                <input type="checkbox" class="custom-control-input" id="customCheck">
                <label class="custom-control-label" for="customCheck">Remember Me</label>
              </div>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-user btn-block">
              Login
            </button>
          </form>
          <hr>
<!--           <div class="text-center">
            <a class="small" href="forgot-password.html">Forgot Password?</a>
          </div> -->
<!--           <div class="text-center">
            <a class="small" href="register.html">Create an Account!</a>
          </div> -->
        </div>
      </div>
    </div>
  </div>

  <?php echo $__env->make('template/applicant/_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/auth/applicant/login.blade.php ENDPATH**/ ?>