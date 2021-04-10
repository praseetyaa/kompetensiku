<!DOCTYPE html>
<html lang="en">

<head>

  <?php echo $__env->make('template/admin/_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <title>Landing Page | Sistem Rekruitmen Karyawan</title>

  <style type="text/css">
    body {height: calc(100vh); background-repeat: no-repeat; background-size: cover; background-position: center;}
    .wrapper {background: rgba(0,0,0,.3);}
    .card {width: 768px; max-width: 768px; background-color: rgba(0,0,0,.6);}
    .link {opacity: 1; transition: .5s ease;}
    .link:hover img {opacity: .5;}
    .middle {color: white; text-transform: uppercase; font-size: 20px; font-weight: bold; transition: .5s ease; opacity: 0; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%); text-align: center;}
    .link:hover .middle {opacity: 1;}
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
          <div class="row">
              <div class="col-sm-6 mb-3">
                  <a href="/admin/login" class="link">
                    <img src="<?php echo e(asset('assets/images/background/admin.jpg')); ?>" class="img-fluid">
                    <span class="middle">
                        <span class="text">Admin Login</span>
                    </span>
                  </a>
              </div>
              <div class="col-sm-6 mb-3">
                  <a href="/hrd/login" class="link">
                    <img src="<?php echo e(asset('assets/images/background/hrd.jpg')); ?>" class="img-fluid">
                    <span class="middle">
                        <span class="text">HRD Login</span>
                    </span>
                  </a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php echo $__env->make('template/admin/_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH D:\XAMPP\htdocs\e-tiket\resources\views/index.blade.php ENDPATH**/ ?>