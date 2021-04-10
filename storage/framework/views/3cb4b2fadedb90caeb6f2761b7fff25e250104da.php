<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php echo $__env->make('template/guest/br/_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('template/guest/br/_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('css-extra'); ?>

	<title><?php echo $__env->yieldContent('title'); ?> <?php echo e(get_website_name()); ?> &#8211; <?php echo e(get_tagline()); ?></title>

</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <?php echo $__env->make('template/guest/br/_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('template/guest/br/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('template/guest/br/_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('js-extra'); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\lms-v2\resources\views/template/guest/br/main.blade.php ENDPATH**/ ?>