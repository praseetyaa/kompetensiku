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
                <h4 class="page-title">Materi E-Course</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/member">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Materi E-Course</li>
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
        <div class="row">
            <!-- column -->
            <div class="col-lg-12">
                <!-- card -->
                <div class="card shadow">
                    <h5 class="card-title border-bottom">Materi E-Course</h5>
                    <div class="card-body">
						<div class="col-12">
							<div class="row">
								<?php $__currentLoopData = $video_folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<a class="col-md-6 col-lg-4 col-xlg-4" href="/member/e-course?dir=<?php echo e($folder->dir_vf); ?>">
									<div class="card card-hover shadow">
										<div class="box text-center">
											<h1 class="font-light text-primary"><i class="mdi mdi-folder"></i></h1>
											<h6 class="text-dark"><?php echo e($folder->nama_vf); ?></h6>
										</div>
									</div>
								</a>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							<div class="row">
								<?php if(count($video_folders)>0 || count($videos)>0): ?>
									<?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<a class="btn-link-video col-md-6 col-lg-4 col-xlg-4" href="#" data-nama="<?php echo e($video->nama_video); ?>" data-kode="<?php echo e($video->kode_youtube); ?>">
										<div class="card card-hover shadow">
											<div class="box text-center">
												<h1 class="font-light text-primary"><i class="mdi mdi-video"></i></h1>
												<h6 class="text-dark"><?php echo e($video->nama_video); ?></h6>
											</div>
										</div>
									</a>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php else: ?>
								<div class="col-12">
									<div class="alert alert-danger text-center"> Materi E-Course belum tersedia.</div>
								</div>
								<?php endif; ?>
							</div>
						</div>
                    </div>
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
    <?php echo $__env->make('template/member/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<!-- Modal Show Video -->
<div class="modal fade" id="modal-show-video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="video-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" allowfullscreen></iframe>
				</div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Show Video -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script type="text/javascript">
    // Button Show Video
    $(document).on("click", ".btn-link-video", function(e){
        e.preventDefault();
        var nama = $(this).data("nama");
        var kode = $(this).data("kode");
        $("#modal-show-video").find("#video-title").text(nama);
        $("#modal-show-video").find(".embed-responsive-item").attr("src","https://www.youtube.com/embed/"+kode+"?rel=0");
		$("#modal-show-video").modal("show");
    });

    // Close Modal Show Video
    $('#modal-show-video').on('hidden.bs.modal', function(e){
        $("#modal-show-video").find("#video-title").text("");
        $("#modal-show-video").find(".embed-responsive-item").attr("src","");
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
    .border-top, .border-bottom {padding: 1.25rem;}
    .form-control {border-color: #caccce;}
    .input-group-text {border-color: #caccce;}
	.box {background-color: #fdd100!important; cursor: pointer;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/member/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/psikologanda.com/laravel-akademi/resources/views/video/member/index.blade.php ENDPATH**/ ?>