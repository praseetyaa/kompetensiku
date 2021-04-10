<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $__env->make('template/guest/_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->yieldContent('css-extra'); ?>
</head>
<body>
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M4QR28H" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <div class="wrapper">
        <!-- Sidebar -->
		<?php echo $__env->make('template/guest/_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Sidebar -->
        <div id="content">
			<?php echo $__env->make('template/guest/_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php echo $__env->yieldContent('content'); ?>
		</div>
	</div>
    <!-- Footer -->
	<?php echo $__env->make('template/guest/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Footer -->
	<?php echo $__env->make('template/guest/_scroll-to-top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('template/guest/_modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-overlay"></div>
	<?php echo $__env->make('template/guest/_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->yieldContent('js-extra'); ?>
</body>
</html><?php /**PATH /var/www/vhosts/psikologanda.com/laravel-akademi/resources/views/template/guest/main.blade.php ENDPATH**/ ?>