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
                <h4 class="page-title">Pelatihan: <?php echo e($pelatihan->nama_pelatihan); ?></h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/member">Home</a></li>
                            <li class="breadcrumb-item"><a href="/member/pelatihan">Pelatihan</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($pelatihan->nama_pelatihan); ?></li>
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
            <div class="col-lg-3 col-md-5">
                <!-- card -->
                <div class="card shadow">
                    <div class="card-body">
						<?php if($pelatihan->trainer != Auth::user()->id_user): ?>
							<?php if($cek_pelatihan != null): ?>
								<?php if($cek_pelatihan->fee_status == 1): ?>
									<div class="alert alert-success text-center mb-5"><i class="fa fa-check mr-2"></i> Anda Sudah Mendaftar</div>
								<?php else: ?>
									<div class="alert alert-warning text-center mb-5">Sedang Menunggu Verifikasi Pembayaran dari Admin</div>
								<?php endif; ?>
							<?php else: ?>
							<a href="#" class="btn btn-primary btn-block btn-pelatihan mb-5"><i class="fa fa-pencil-alt mr-2"></i> Daftar Pelatihan</a>
							<?php endif; ?>
							<form id="form" class="d-none" method="post" action="/member/pelatihan/daftar">
								<?php echo e(csrf_field()); ?>

								<input type="hidden" name="id" value="<?php echo e($pelatihan->id_pelatihan); ?>">
							</form>
						<?php endif; ?>
						<p class="h5">Nomor:</p>
						<p><?php echo e($pelatihan->nomor_pelatihan); ?></p>
						<br>
						<p class="h5">Waktu Pelatihan:</p>
						<p>
							<?php echo e(generate_date_range('join', $pelatihan->tanggal_pelatihan_from.' - '.$pelatihan->tanggal_pelatihan_to)['from']); ?> s.d. <?php echo e(generate_date_range('join', $pelatihan->tanggal_pelatihan_from.' - '.$pelatihan->tanggal_pelatihan_to)['to']); ?>

						</p>
						<br>
						<p class="h5">Trainer:</p>
						<p><?php echo e($pelatihan->nama_user); ?></p>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-9 col-md-7">
                <!-- card -->
                <div class="card shadow">
                    <div class="card-body">
						<div class="ql-snow"><div class="ql-editor p-0"><?php echo html_entity_decode($pelatihan->deskripsi_pelatihan); ?></div></div>
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

<!-- Modal Daftar Pelatihan -->
<div class="modal fade" id="modalPendaftaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Pelatihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="row">
					<div class="col-12 text-center mb-3">
						<p class="h5">Biaya Pendaftaran:</p>
						<p class="h1 text-success"><?php echo e($pelatihan->fee_member > 0 ? 'Rp. '.number_format($pelatihan->fee_member,0,'.','.') : 'Gratis!'); ?></p>
					</div>
				</div>
				<?php if($pelatihan->fee_member > 0): ?>
				<div class="alert alert-warning mb-4">
					<p class="mb-0">Anda bisa membayarnya di rekening berikut:</p>
					<ol style="padding-left: 1rem;">
						<?php $__currentLoopData = $default_rekening; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><strong><?php echo e($data->nama_platform); ?></strong> dengan nomor rekening <strong><?php echo e($data->nomor); ?></strong> a/n <strong><?php echo e($data->atas_nama); ?></strong>.</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ol>
				</div>
				<?php endif; ?>
				<form id="form-register" method="post" action="/member/pelatihan/daftar" enctype="multipart/form-data">
					<?php echo e(csrf_field()); ?>

					<input type="hidden" name="id" value="<?php echo e($pelatihan->id_pelatihan); ?>">
					<input type="hidden" name="fee" value="<?php echo e($pelatihan->fee_member); ?>">
					<input type="file" name="foto" id="file" class="d-none" name="bukti_pembayaran" accept="image/*">
					<?php if($pelatihan->fee_member > 0): ?>
					<div class="form-group">
						<label>Invoice:</label>
						<input type="text" name="inv_pelatihan" class="form-control" value="<?php echo e($invoice); ?>" readonly>
					</div>
					<?php else: ?>
						<input type="hidden" name="inv_pelatihan" class="form-control" value="<?php echo e($invoice); ?>">
					<?php endif; ?>
				</form>
				<?php if($pelatihan->fee_member > 0): ?>
                <button type="button" class="btn btn-md btn-primary btn-block" id="btn-upload"><i class="fa fa-upload mr-2"></i>Upload Bukti Pembayaran</button>
				<img id="foto" class="img-thumbnail mt-3 d-none">
				<?php endif; ?>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-md btn-success btn-block" id="btn-submit-confirmation" <?php echo e($pelatihan->fee_member > 0 ? 'disabled' : ''); ?>>Daftar</button>
			</div>
        </div>
    </div>
</div>
<!-- End Modal Daftar Pelatihan -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script type="text/javascript">
    // Button Daftar Pelatihan
    $(document).on("click", ".btn-pelatihan", function(e){
        e.preventDefault();
		$("#modalPendaftaran").modal("show");
		//$("#form").submit();
    });
	
	// Upload Bukti Pembayaran
	$(document).on("click", "#btn-upload", function(e){
        e.preventDefault();
		$("#file").trigger("click");
	});
	
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#foto").attr("src",e.target.result).removeClass("d-none");
				$("#btn-submit-confirmation").removeAttr("disabled");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
	
	$(document).on("change", "#file", function(){
		readURL(this);
	});
	
    // Button Submit Daftar Pelatihan
    $(document).on("click", "#btn-submit-confirmation", function(e){
        e.preventDefault();
		$("#form-register").submit();
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style type="text/css">
    .border-top, .border-bottom {padding: 1.25rem;}
    .form-control {border-color: #caccce;}

	/* Quill */
	.ql-editor h2, .ql-editor h3 {margin-bottom: 1rem!important; font-weight: 600!important;}
	.ql-editor p {margin-bottom: 1rem!important;}
	.ql-editor ol {padding-left: 30px!important;}
	.ql-editor ol li {font-size: 14px!important; color: #74757f!important; padding-left: 5px!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/member/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/pelatihan/member/detail.blade.php ENDPATH**/ ?>