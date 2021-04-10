<!DOCTYPE html>
<html lang="en">
<head>

	<title><?php echo $__env->yieldContent('title'); ?> <?php echo e(get_website_name()); ?> &#8211; <?php echo e(get_tagline()); ?></title>

	<?php echo $__env->make('template/guest/_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<?php echo $__env->make('template/guest/_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<?php echo $__env->yieldContent('css-extra'); ?>

</head>
<body>

    <div class="wrap">

		<?php echo $__env->make('template/guest/_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
		<?php echo $__env->yieldContent('content'); ?>
		
		<?php echo $__env->make('template/guest/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<?php echo $__env->make('template/guest/_preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
	</div>
	
	<?php echo $__env->make('template/guest/_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<?php echo $__env->yieldContent('js-extra'); ?>

</body>
</html><?php /**PATH C:\xampp\htdocs\lms\resources\views/template/guest/main.blade.php ENDPATH**/ ?>