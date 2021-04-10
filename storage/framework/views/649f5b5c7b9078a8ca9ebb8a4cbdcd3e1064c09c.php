<!DOCTYPE html>
<html lang="en">

<head>

	<?php echo $__env->make('template/applicant/_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<?php echo $__env->yieldContent('css-extra'); ?>

	<title>Applicant Page | Sistem Rekruitmen Karyawan</title>

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<?php echo $__env->make('template/applicant/_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<?php echo $__env->make('template/applicant/_topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		        <!-- Begin Page Content -->
		        <div class="container-fluid">

		        	<?php echo $__env->yieldContent('content'); ?>

		        </div>
		        <!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

	  		<?php echo $__env->make('template/applicant/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	    </div>
	    <!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<?php echo $__env->make('template/applicant/_scroll-to-top-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<?php echo $__env->make('template/applicant/_logout-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<?php echo $__env->make('template/applicant/_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<?php echo $__env->yieldContent('js-extra'); ?>

</body>

</html>
<?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/template/applicant/template.blade.php ENDPATH**/ ?>