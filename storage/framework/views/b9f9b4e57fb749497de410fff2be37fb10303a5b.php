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
                <h4 class="page-title">Edit Pop-up</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/pop-up">Pop-up</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Pop-up</li>
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
                    <h5 class="card-title border-bottom">Edit Pop-up</h5>
                    <div class="card-body">
                        <?php if(Session::get('message') != null): ?>
                            <div class="alert alert-success alert-dismissible mb-4 fade show" Blog="alert">
                                <?php echo e(Session::get('message')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <form id="form" method="post" action="/admin/pop-up/update" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

							<input type="hidden" name="id" value="<?php echo e($popup->id_popup); ?>">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Judul <span class="text-danger">*</span></label>
									<input type="text" name="judul" class="form-control <?php echo e($errors->has('judul') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Judul" value="<?php echo e($popup->popup_judul); ?>">
                                    <?php if($errors->has('judul')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('judul'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-12">
									<div class="row">
										<div class="col-md-6">
											<label>Waktu Aktif Pop-up <span class="text-danger">*</span></label>
											<input type="text" name="waktu_aktif" id="daterangepicker" class="form-control <?php echo e($errors->has('waktu_aktif') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Waktu Aktif Pop-up" value="<?php echo e($glue); ?>">
											<?php if($errors->has('waktu_aktif')): ?>
											<small class="text-danger"><?php echo e(ucfirst($errors->first('waktu_aktif'))); ?></small>
											<?php endif; ?>
										</div>
									</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Gambar <span class="text-danger">*</span></label>
									<br>
									<input type="file" name="gambar" id="file" class="d-none" accept="image/*">
									<button class="btn btn-primary" id="btn-upload"><i class="fa fa-folder-open mr-2"></i>Upload</button>
									<br>
									<input type="hidden" name="gambar_src" value="<?php echo e($popup->popup_gambar); ?>">
									<img class="img-thumbnail mt-3" src="<?php echo e(asset('assets/images/pop-up/'.$popup->popup_gambar)); ?>" id="img-upload" style="max-height: 250px;">
                                    <?php if($errors->has('gambar')): ?>
                                    <div class="small mt-2 text-danger"><?php echo e(ucfirst($errors->first('gambar'))); ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Konten <span class="text-danger">*</span></label>
                                    <textarea name="konten" id="konten" class="d-none"></textarea>
                                    <div id="editor"><?php echo html_entity_decode($popup->popup_konten); ?></div> 
                                    <?php if($errors->has('konten')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('konten'))); ?></small>
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

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script type="text/javascript">
	// Daterangepicker
	$("#daterangepicker").daterangepicker({
		locale: {
			format: 'DD/MM/YYYY'
		}
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
	
	/* Upload File */
	$(document).on("click", "#btn-upload", function(e){
		e.preventDefault();
		$("#file").trigger("click");
	});

	// File Change
    $(document).on("change", "#file", function(){
		readURL(this);
    });

    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
				$("input[name=gambar_src]").val("1");
                $("#img-upload").attr("src",e.target.result).removeClass("d-none");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
	
    // Button Submit
    $(document).on("click", "#btn-submit", function(e){
        var myEditor = document.querySelector('#editor');
        var html = myEditor.children[0].innerHTML;
        $("#konten").text(html);
        $("#form").submit();
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style type="text/css">
    #editor {height: 500px;}
	.ql-editor h1, .ql-editor h2, .ql-editor h3, .ql-editor h4, .ql-editor h5, .ql-editor h6, .ql-editor p {margin-bottom: 1rem!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/pop-up/admin/edit.blade.php ENDPATH**/ ?>