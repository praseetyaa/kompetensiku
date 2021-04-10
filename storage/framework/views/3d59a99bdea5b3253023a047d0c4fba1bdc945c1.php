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
                <h4 class="page-title">Tambah Video</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/e-course">Materi E-Course</a></li>
                            <li class="breadcrumb-item"><a href="/admin/e-course">Chapter</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Video</li>
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
                    <h5 class="card-title border-bottom">Tambah Video</h5>
                    <div class="card-body">
                        <form id="form" method="post" action="/admin/e-course/store" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="chapter" value="<?php echo e($chapter->chapter_nomor); ?>">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Nomor <span class="text-danger">*</span></label>
                                    <select name="course_nomor" class="form-control <?php echo e($errors->has('course_nomor') ? 'is-invalid' : ''); ?>">
										<option value="" disabled selected>--Pilih Nomor Video--</option>
                                        <?php for($i=1; $i<=20; $i++): ?>
										<option value="<?php echo e($i); ?>" <?php echo e(in_array($i, $array) ? 'disabled' : ''); ?>>#<?php echo e($i); ?></option>
                                        <?php endfor; ?>
									</select>
                                    <?php if($errors->has('course_nomor')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('course_nomor'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Judul <span class="text-danger">*</span></label>
                                    <input type="text" name="judul" class="form-control <?php echo e($errors->has('judul') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('judul')); ?>" placeholder="Masukkan Judul">
                                    <?php if($errors->has('judul')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('judul'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Thumbnail</label>
									<br>
									<input type="file" id="file" class="d-none" accept="image/*">
									<button class="btn btn-sm btn-primary btn-file"><i class="fa fa-folder-open mr-2"></i>Pilih Gambar...</button>
                                    <div class="mt-2 text-muted">Resolusi gambar yaitu 2:1</div>
									<img id="img-file" class="mt-2 img-thumbnail d-none" style="max-height: 150px">
									<input type="hidden" name="thumbnail" id="src-img">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Caption <span class="text-danger">*</span></label>
                                    <textarea name="caption" class="form-control <?php echo e($errors->has('caption') ? 'is-invalid' : ''); ?>" rows="3" placeholder="Masukkan Caption"></textarea>
                                    <?php if($errors->has('caption')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('caption'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Kode YouTube <span class="text-danger">*</span></label>
                                    <input type="text" name="kode_youtube" class="form-control <?php echo e($errors->has('kode_youtube') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('kode_youtube')); ?>" placeholder="Masukkan Kode YouTube">
                                    <?php if($errors->has('kode_youtube')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('kode_youtube'))); ?></small>
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

<!-- Modal Croppie -->
<div class="modal fade" id="modalCroppie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crop Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="table-responsive">
                	<div id="demo" class="mt-3"></div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-crop">Crop and Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Croppie -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script type="text/javascript" src="<?php echo e(asset('assets/plugins/croppie/croppie.min.js')); ?>"></script>
<script type="text/javascript">
    /* Croppie */
    var demo = $('#demo').croppie({
        viewport: {width: 600, height: 300},
        boundary: {width: 600, height: 300}
    });
    var imageURL;
	
    // Button File
    $(document).on("click", ".btn-file", function(e){
		e.preventDefault();
        $("#file").trigger("click");
    });
	
    // Change Input File
    $(document).on("change", "#file", function(){
        readURL(this);
        $("#modalCroppie").modal("show");
    });
	
	// Show Modal Croppie
    $('#modalCroppie').on('shown.bs.modal', function(){
        demo.croppie('bind', {
            url: imageURL
        }).then(function(){
            console.log('jQuery bind complete');
        });
    });
	
	// Hide Modal Croppie
    $('#modalCroppie').on('shown.bs.hidden', function(){
		$("#img-file").removeAttr("src");
        $("input[name=gambar]").val("");
        $("#file").val(null);
    });

	// Crop Image
    $(document).on("click", "#btn-crop", function(e){
        demo.croppie("result", {
            type: "base64",
            format: "jpg",
            size: {width: 960, height: 480}
        }).then(function(response){
			$("#img-file").attr("src",response).removeClass("d-none");
            $("input[name=gambar]").val(response);
        });
        $("#file").val(null);
        $("#modalCroppie").modal("hide");
    });

    // Button Submit
    $(document).on("click", "#btn-submit", function(e){
        $("#form").submit();
    });

    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                imageURL = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/plugins/croppie/croppie.css')); ?>">

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/e-course/admin/create.blade.php ENDPATH**/ ?>