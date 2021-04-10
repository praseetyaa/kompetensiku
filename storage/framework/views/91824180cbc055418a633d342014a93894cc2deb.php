<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Admin Area | <?php echo e(get_website_name()); ?> &#8211; <?php echo e(get_tagline()); ?></title>
    <?php echo $__env->make('template/admin/_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style type="text/css">
		::-webkit-scrollbar {width: 5px; overflow: visible;}
		::-webkit-scrollbar-track {background: <?php echo e(get_warna_scroll_track()); ?>;}
		::-webkit-scrollbar-thumb {background: <?php echo e(get_warna_scroll_thumb()); ?>;}

        label {font-weight: 700;}
        option:disabled {background-color: #e5e5e5;}

        #navbarSupportedContent {background: <?php echo e(get_warna_primer()); ?>!important;}
        .navbar-header[data-logobg=skin5] {background: <?php echo e(get_warna_sekunder()); ?>!important;}
        #main-wrapper .left-sidebar[data-sidebarbg=skin5], #main-wrapper .left-sidebar[data-sidebarbg=skin5] ul {background: <?php echo e(get_warna_tersier()); ?>!important;}

		.page-wrapper {background: linear-gradient(180deg, #eeeeee, #ffffff)!important;}
        .page-wrapper > .container-fluid {min-height: calc(100vh - 163px);}
        .logo-text {font-weight: bold; font-size: 1.3rem; text-transform: uppercase; color: <?php echo e(get_warna_teks_logo()); ?>!important;}
        .navbar-nav .dropdown-menu {background-color: #eeeeee;}
        .dropdown-menu .dropdown-item:hover {background-color: #dddddd;}
        .card .card-title {margin-bottom: 0px; font-weight: 700;}
        .border-top, .border-bottom {padding: 1.25rem;}
        .form-check-label {font-weight: 600!important;}
        .form-control {border-color: #caccce;}
        .input-group-text {border-color: #caccce;}
	    .modal {overflow-y: auto;}
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

</html><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-v3/resources/views/template/admin/main.blade.php ENDPATH**/ ?>