<?php $__env->startSection('content'); ?>

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
     <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">File Tidak Terpakai</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/file">File</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tidak Terpakai</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- row -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-lg-12">
                <!-- card -->
                <div class="card shadow">
                    <div class="card-title border-bottom">
                        <div class="row">
                            <div class="col-12 col-sm py-1 mb-2 mb-sm-0 text-center text-sm-left">
                                <h5 class="mb-0">File Tidak Terpakai</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(Session::get('message') != null): ?>
                            <div class="alert alert-success alert-dismissible mb-4 fade show" Blog="alert">
                                <?php echo e(Session::get('message')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
						<div class="row mb-3">
							<div class="col-12">
								<label>Direktori:</label>
								<?php echo e(URL::to('/')); ?>/
								<select name="dir" id="dir">
                                    <?php $__currentLoopData = $path; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($data->path); ?>" <?php echo e($dir == $data->path ? 'selected' : ''); ?>><?php echo e($data->path); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<br>
								<strong><?php echo e(count($array)); ?> file ditemukan</strong>
								<?php if(count($array) > 0): ?>
								<br>
								<form id="form-delete-all" class="mt-2" method="post" action="/admin/file/unused/delete-all">
									<?php echo e(csrf_field()); ?>

									<button type="button" class="btn btn-primary btn-delete-all">Hapus Semua</button>
									<input type="hidden" name="dir" value="<?php echo e($dir); ?>">
								</form>
								<?php endif; ?>
							</div>
						</div>
						<div class="row">
							<?php if(count($array) > 0): ?>
								<?php $__currentLoopData = $array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-lg-3 col-md-6">
									<div class="card shadow">
										<a href="<?php echo e(asset($dir.'/'.$data)); ?>" class="image-popup-vertical-fit card-image-top" title="<?php echo e($data); ?>" style="background-image: url('<?php echo e(asset($dir.'/'.$data)); ?>');"></a>
										<div class="card-body">
											<a href="#" class="btn btn-danger btn-delete" data-id="<?php echo e($data); ?>">Hapus</a>
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php else: ?>
								<div class="col-12">
									<div class="alert alert-danger text-center">
										Tidak ada file yang tidak terpakai.
									</div>
								</div>
							<?php endif; ?>
						</div>
                    </div>
					<form id="form" class="d-none" method="post" action="/admin/file/unused/delete">
						<?php echo e(csrf_field()); ?>

						<input type="hidden" name="id" id="id">
						<input type="hidden" name="dir" value="<?php echo e($dir); ?>">
					</form>
                </div>
                <!-- card -->
            </div>
            <!-- column -->
        </div>
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <?php echo $__env->make('template/admin/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/magnific-popup/meg.init.js')); ?>"></script>
<script type="text/javascript">
	// Popup image
	$('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300 // don't foget to change the duration also in CSS
		},
	});

    // Change Directory
    $(document).on("change", "#dir", function(){
        var dir = $(this).val();
        window.location.href = '/admin/file/unused?dir='+dir;
    });

    // Button Delete
    $(document).on("click", ".btn-delete", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var ask = confirm("Anda yakin ingin menghapus data ini?");
        if(ask){
            $("#id").val(id);
            $("#form").submit();
        }
    });

    // Button Delete All
    $(document).on("click", ".btn-delete-all", function(e){
        e.preventDefault();
        var ask = confirm("Anda yakin ingin menghapus semua data ini?");
        if(ask){
            $("#form-delete-all").submit();
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/magnific-popup/dist/magnific-popup.css')); ?>" rel="stylesheet">
<style type="text/css">
	.card-image-top {background-position: top center; background-size: cover; background-repeat: no-repeat; height: 200px;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/file/admin/unused.blade.php ENDPATH**/ ?>