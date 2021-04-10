

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
                <h4 class="page-title">Galeri</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Galeri</li>
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
        <!-- URL Referral -->
        <!-- ============================================================== -->
		<div class="row el-element-overlay">
			<?php if(Session::get('message') != null): ?>
			<div class="col-12">
				<div class="alert alert-success alert-dismissible mb-4 fade show" role="alert">
					<?php echo e(Session::get('message')); ?>

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<?php endif; ?>
			<?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-lg-2 col-md-4 col-sm-6">
				<div class="card shadow">
					<div class="el-card-item">
						<div class="el-card-avatar el-overlay-1"> <img src="<?php echo e(asset('assets/images/users/'.$photo->photo_name)); ?>" alt="user" />
							<div class="el-overlay">
								<ul class="list-style-none el-info">
									<li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="<?php echo e(asset('assets/images/users/'.$photo->photo_name)); ?>"><i class="mdi mdi-magnify-plus"></i></a></li>
									<li class="el-item">
										<?php if($photo->status == 1): ?>
										<a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="mdi mdi-link"></i></a>
										<?php else: ?>
										<a class="btn default btn-outline btn-delete el-link" href="javascript:void(0);" data-id="<?php echo e($photo->id_pp); ?>" title="Delete"><i class="mdi mdi-delete"></i></a>
										<?php endif; ?>
									</li>
								</ul>
							</div>
						</div>
						<div class="el-card-content">
							<h4 class="m-b-0"></h4> <span class="text-muted"><?php echo e($photo->photo_name); ?></span>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		<form id="form-delete" class="d-none" method="post" action="/admin/galeri/delete">
			<?php echo e(csrf_field()); ?>

			<input type="hidden" name="id" id="id">
		</form>
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
<script>
    // Button Delete
    $(document).on("click", ".btn-delete", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var ask = confirm("Anda yakin ingin menghapus data ini?");
        if(ask){
            $("#id").val(id);
            $("#form-delete").submit();
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/magnific-popup/dist/magnific-popup.css')); ?>" rel="stylesheet">
<style type="text/css">
    .border-top, .border-bottom {padding: 1.25rem;}
	.mfp-close {cursor: pointer!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-referral/resources/views/photo/admin/index.blade.php ENDPATH**/ ?>