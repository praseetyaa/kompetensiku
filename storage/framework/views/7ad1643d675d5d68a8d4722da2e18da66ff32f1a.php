

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
                <h4 class="page-title">Edit Script</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/script">Kumpulan Copywriting</a></li>
                            <li class="breadcrumb-item"><a href="/admin/script/rak/<?php echo e($rak->id_rak); ?>"><?php echo e($rak->rak); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Script</li>
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
            <div class="col-lg-6 mx-auto">
                <!-- card -->
                <div class="card shadow">
                    <h5 class="card-title border-bottom">Edit Script</h5>
                    <div class="card-body">
                        <form id="form" method="post" action="/admin/script/update" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($script->id_script); ?>">
                            <input type="hidden" name="id_rak" value="<?php echo e($rak->id_rak); ?>">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Judul Script <span class="text-danger">*</span></label>
                                    <input type="text" name="judul" class="form-control <?php echo e($errors->has('judul') ? 'is-invalid' : ''); ?>" value="<?php echo e($script->script_title); ?>" placeholder="Masukkan Judul Script">
                                    <?php if($errors->has('judul')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('judul'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Thumbnail</label>
									<br>
									<input type="file" id="file" class="d-none" accept="image/*">
									<button class="btn btn-sm btn-primary btn-file"><i class="fa fa-folder-open mr-2"></i>Pilih Gambar...</button>
                                    <div class="mt-2 text-muted">Resolusi gambar direkomendasikan 16:9</div>
									<img id="img-file" src="<?php echo e($script->script_thumbnail != '' ? asset('assets/images/script/'.$script->script_thumbnail) : ''); ?>" class="mt-2 img-thumbnail <?php echo e($script->script_thumbnail != '' ? '' : 'd-none'); ?>" style="max-height: 150px">
									<input type="hidden" name="gambar" id="src-img">
                                    <?php if($errors->has('gambar')): ?>
                                    <div class="mt-2 small text-danger"><?php echo e(ucfirst($errors->first('gambar'))); ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Script <span class="text-danger">*</span></label>
                                    <textarea name="script" class="form-control <?php echo e($errors->has('script') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Script" rows="10"><?php echo html_entity_decode($script->script); ?></textarea>
                                    <?php if($errors->has('script')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('script'))); ?></small>
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
    <div class="modal-dialog modal-lg" role="document">
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
        viewport: {width: 848, height: 480},
        boundary: {width: 848, height: 480}
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
            size: {width: 848, height: 480}
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
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/public_html/laravel-v3/resources/views/script/admin/edit.blade.php ENDPATH**/ ?>