<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Campus Digital | Admin Area</title>
    <?php echo $__env->make('template/admin/_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style type="text/css">
        .page-wrapper > .container-fluid {min-height: calc(100vh - 163px);}
        .dropdown-menu .dropdown-item:hover {background-color: #eee;}
        .card .card-title {margin-bottom: 0px;}
    </style>
    <?php echo $__env->yieldContent('css-extra'); ?>
</head>

<body>
    <?php echo $__env->make('template/admin/_preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?php echo $__env->make('template/admin/_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('template/admin/_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <?php echo $__env->make('template/admin/_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('js-extra'); ?>
</body>

</html><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-referral/resources/views/template/admin/main.blade.php ENDPATH**/ ?>