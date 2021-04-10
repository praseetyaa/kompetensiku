<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Admin Area | <?php echo e(get_website_name()); ?> &#8211; <?php echo e(get_tagline()); ?></title>
    <?php echo $__env->make('template/admin/_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('template/admin/_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

</html><?php /**PATH C:\xampp\htdocs\lms-v2\resources\views/template/admin/main.blade.php ENDPATH**/ ?>