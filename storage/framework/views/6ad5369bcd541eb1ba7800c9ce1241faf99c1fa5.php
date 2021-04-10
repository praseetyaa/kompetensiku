<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title><?php echo e(Auth::user()->role != 3 ? $global_total > 0 ? '('.$global_total.')' : '' : ''); ?> Campus Digital | Admin Area</title>
    <?php echo $__env->make('template/admin/_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style type="text/css">
        .navbar-header[data-logobg=skin5] {background:#FDD100!important;}
        #main-wrapper .topbar .navbar-collapse[data-navbarbg=skin5], #main-wrapper .topbar[data-navbarbg=skin5] {background:#330369!important;}
        #main-wrapper .left-sidebar[data-sidebarbg=skin5], #main-wrapper .left-sidebar[data-sidebarbg=skin5] ul {background:#451579!important;}
        #main-wrapper .left-sidebar[data-sidebarbg=skin5] .create-btn,#main-wrapper .left-sidebar[data-sidebarbg=skin5] ul .create-btn{background:#451579!important;}

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

</html><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-campusdigital/resources/views/template/admin/main.blade.php ENDPATH**/ ?>