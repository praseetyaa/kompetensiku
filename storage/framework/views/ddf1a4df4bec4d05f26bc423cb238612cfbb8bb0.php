

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
                <h4 class="page-title">Edit Pelatihan</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/member">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/pelatihan">Pelatihan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Pelatihan</li>
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
                    <h5 class="card-title border-bottom">Edit Pelatihan</h5>
                    <div class="card-body">
                        <form id="form" method="post" action="/admin/pelatihan/update">
                            <?php echo e(csrf_field()); ?>

							<input type="hidden" name="id" value="<?php echo e($pelatihan->id_pelatihan); ?>">
                            <div class="row">
								<div class="form-group col-md-6">
									<label>Nama Pelatihan <span class="text-danger">*</span></label>
									<input type="text" name="nama_pelatihan" class="form-control <?php echo e($errors->has('nama_pelatihan') ? 'is-invalid' : ''); ?>" value="<?php echo e($pelatihan->nama_pelatihan); ?>" placeholder="Masukkan Nama Pelatihan">
									<?php if($errors->has('nama_pelatihan')): ?>
									<small class="text-danger"><?php echo e(ucfirst($errors->first('nama_pelatihan'))); ?></small>
									<?php endif; ?>
								</div>
								<div class="form-group col-md-6">
									<label>Trainer <span class="text-danger">*</span></label>
									<select name="trainer" class="form-control <?php echo e($errors->has('trainer') ? 'is-invalid' : ''); ?>">
										<option value="" disabled selected>--Pilih--</option>
										<?php $__currentLoopData = $mentor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($data->id_user); ?>" <?php echo e($pelatihan->trainer == $data->id_user ? 'selected' : ''); ?>><?php echo e($data->nama_user); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
									<?php if($errors->has('trainer')): ?>
									<small class="text-danger"><?php echo e(ucfirst($errors->first('trainer'))); ?></small>
									<?php endif; ?>
								</div>
								<div class="form-group col-md-6">
									<label>Waktu Pelatihan <span class="text-danger">*</span></label>
									<div class="row">
										<div class="col-md-6">
											<input type="text" name="tanggal_pelatihan" class="form-control <?php echo e($errors->has('tanggal_pelatihan') ? 'border-danger' : ''); ?>" value="<?php echo e(date('Y-m-d', strtotime($pelatihan->tanggal_pelatihan))); ?>" placeholder="Masukkan Tanggal Pelatihan (Format: yyyy-mm-dd)">
											<?php if($errors->has('tanggal_pelatihan')): ?>
											<div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('tanggal_pelatihan'))); ?></div>
											<?php endif; ?>
										</div>
										<div class="col-md-6">
											<input type="text" name="jam_pelatihan" class="form-control <?php echo e($errors->has('jam_pelatihan') ? 'border-danger' : ''); ?>" value="<?php echo e(date('H:i', strtotime($pelatihan->tanggal_pelatihan))); ?>" placeholder="Masukkan Jam Pelatihan">
											<?php if($errors->has('tanggal_pelatihan')): ?>
											<div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('jam_pelatihan'))); ?></div>
											<?php endif; ?>
										</div>
									</div>
								</div>
                                <div class="form-group col-md-12">
                                    <label>Deskripsi <span class="text-danger">*</span></label>
                                    <textarea name="deskripsi" id="deskripsi" class="d-none"></textarea>
                                    <div id="editor"><?php echo html_entity_decode($pelatihan->deskripsi_pelatihan); ?></div> 
                                    <?php if($errors->has('deskripsi')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('deskripsi'))); ?></small>
                                    <?php endif; ?>
                                </div>
							</div>
                        </form>
                    </div>
                    <div class="border-top">
                        <button id="btn-submit" type="submit" class="btn btn-success">Simpan</button>
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

<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js" integrity="sha256-LPgEyZbedErJpp8m+3uasZXzUlSl9yEY4MMCEN9ialU=" crossorigin="anonymous"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		// Datepicker
		$("input[name=tanggal_pelatihan]").datepicker({
			format: 'yyyy-mm-dd',
			todayHighlight: true,
			autoclose: true
		});
		
		// Clockpicker
    	$("input[name=jam_pelatihan]").clockpicker({
			autoclose: true
		});
		
		// Quill Editor
		var toolbarOptions = [
			[{ 'header': [1, 2, 3, 4, 5, 6, false] }],
			['bold', 'italic', 'underline', 'strike'],
			[{ 'script': 'sub'}, { 'script': 'super' }],
			['link', 'image', 'video'],
			[{ 'list': 'ordered'}, { 'list': 'bullet' }],
			[{ 'align': [] }],
			[{ 'indent': '-1'}, { 'indent': '+1' }],
			[{ 'direction': 'rtl' }],
			[{ 'color': [] }, { 'background': [] }],
			['clean']     
		];

		var quill = new Quill('#editor', {
			modules: {
				toolbar: toolbarOptions
			},
			placeholder: 'Tulis sesuatu...',
			theme: 'snow',
			imageResize: {
				displayStyles: {
					backgroundColor: 'black',
					border: 'none',
					color: 'white'
				},
				modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
			}
		});
	});
	
    // Button Submit
    $(document).on("click", "#btn-submit", function(e){
        var myEditor = document.querySelector('#editor');
        var html = myEditor.children[0].innerHTML;
        $("#deskripsi").text(html);
        $("#form").submit();
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css" integrity="sha256-lBtf6tZ+SwE/sNMR7JFtCyD44snM3H2FrkB/W400cJA=" crossorigin="anonymous" />
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style type="text/css">
    .border-top, .border-bottom {padding: 1.25rem;}
    .form-control {border-color: #caccce;}
	#platform {width: 200px; height: 250px; overflow-y: scroll; overflow-x: hidden;}
    #editor {height: 500px;}
	
	/* Quill */
	.ql-editor h2 {margin-bottom: 1rem!important;}
	.ql-editor p {margin-bottom: 1rem!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-campusdigital/resources/views/pelatihan/admin/edit.blade.php ENDPATH**/ ?>