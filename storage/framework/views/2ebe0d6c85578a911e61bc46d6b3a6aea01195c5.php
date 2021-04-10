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
                <h4 class="page-title">Detail Pelatihan</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/pelatihan">Pelatihan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Pelatihan</li>
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
                    <h5 class="card-title border-bottom">Detail Pelatihan</h5>
                    <div class="card-body">
						<p class="h4 text-center"><?php echo e($pelatihan->nama_pelatihan); ?></p>
						<div class="row mt-5">
							<div class="col-lg-auto pr-5">
								<p class="h5">Nomor:</p>
								<p><?php echo e($pelatihan->nomor_pelatihan); ?></p>
								<br>
								<p class="h5">Waktu Pelatihan:</p>
								<p><?php echo e(setFullDate($pelatihan->tanggal_pelatihan)); ?>, Pukul <?php echo e(date('H:i', strtotime($pelatihan->tanggal_pelatihan))); ?> WIB</p>
								<br>
								<p class="h5">Trainer:</p>
								<p><?php echo e($pelatihan->nama_user); ?></p>
								<br>
							</div>
							<div class="col-lg">
								<p class="h5 mb-0">Deskripsi:</p>
								<div class="ql-snow"><div class="ql-editor p-0"><?php echo html_entity_decode($pelatihan->deskripsi_pelatihan); ?></div></div>
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
    <?php echo $__env->make('template/admin/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style type="text/css">
    .border-top, .border-bottom {padding: 1.25rem;}
    .form-control {border-color: #caccce;}
	

	/* Quill */
	.ql-editor h2 {margin-bottom: 1rem!important; font-weight: 600!important;}
	.ql-editor h3 {margin-bottom: 1rem!important; font-weight: 600!important;}
	.ql-editor p {margin-bottom: 1rem!important;}
	.ql-editor ol {padding-left: 30px!important;}
	.ql-editor ol li {font-size: 14px!important; color: #74757f!important; padding-left: 5px!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-campusdigital/resources/views/pelatihan/admin/detail.blade.php ENDPATH**/ ?>