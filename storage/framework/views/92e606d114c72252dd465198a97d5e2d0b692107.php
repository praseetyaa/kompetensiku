<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $__env->make('template/guest/qubisa/_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->yieldContent('css-extra'); ?>
</head>
<body>
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M4QR28H" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <div class="wrapper">
        <!-- Sidebar -->
		<?php echo $__env->make('template/guest/qubisa/_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Sidebar -->
        <div id="content">
			<?php echo $__env->make('template/guest/qubisa/_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php echo $__env->yieldContent('content'); ?>
		</div>
	</div>
    <!-- Footer -->
	<?php echo $__env->make('template/guest/qubisa/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Footer -->
	<?php echo $__env->make('template/guest/qubisa/_scroll-to-top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('template/guest/qubisa/_modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-overlay"></div>
	<?php echo $__env->make('template/guest/qubisa/_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->yieldContent('js-extra'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\lms-v2\resources\views/template/guest/qubisa/main.blade.php ENDPATH**/ ?>