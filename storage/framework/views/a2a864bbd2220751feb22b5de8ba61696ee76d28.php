

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
                <h4 class="page-title">Profil Admin</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/user">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profil Admin</li>
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
            <div class="col-lg-4">
                <!-- row -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <!-- card -->
                        <div class="card shadow">
                            <h5 class="card-title border-bottom">Foto Profil</h5>
                            <div class="card-body">
                                <?php if(Session::get('updatePhotoMessage') != null): ?>
                                <div class="alert alert-success alert-dismissible mb-3 fade show" role="alert">
                                    <?php echo e(Session::get('updatePhotoMessage')); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-auto mx-auto p-0">
                                        <img src="<?php echo e(Auth::user()->foto != '' ? asset('assets/images/users/'.Auth::user()->foto) : asset('templates/matrix-admin/assets/images/users/1.jpg')); ?>" class="img-thumbnail img-fluid" id="image" height="200" width="200">
                                        <div id="image-overlay">
                                            <span>Ganti Foto</span>
                                        </div>
                                        <input type="file" name="file" id="file" class="d-none" accept="image/*">
                                    </div>
                                    <div class="col-12 text-center text-muted mt-2">Klik pada gambar untuk mengganti foto profil.</div>
                                </div>
                            </div>
                        </div>
                        <!-- card -->
                    </div>
                    <!-- column -->
                </div>
                <!-- row -->
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-8">
                <!-- card -->
                <div class="card shadow">
                    <h5 class="card-title border-bottom">Identitas Diri</h5>
                    <div class="card-body">
                        <form id="form-identity" method="post" action="#">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Nama Lengkap:</label>
                                    <div><?php echo e($user->nama_user); ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tanggal Lahir:</label>
                                    <div><?php echo e(setFullDate(date('Y-m-j', strtotime($user->tanggal_lahir)))); ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Jenis Kelamin:</label>
                                    <div><?php echo e($user->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan'); ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nomor HP:</label>
                                    <div><?php echo e($user->nomor_hp); ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Username:</label>
                                    <div><?php echo e($user->username); ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email:</label>
                                    <div><?php echo e($user->email); ?></div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Role:</label>
                                    <div><?php echo e($user->nama_role); ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Login Terakhir:</label>
                                    <div>
										<?php if($user->last_visit != null): ?>
											<?php echo e(setFullDate(date('Y-m-j', strtotime($user->last_visit)))); ?> pukul <?php echo e(date('H:i:s', strtotime($user->last_visit))); ?>

										<?php else: ?>
											-
										<?php endif; ?>
									</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Waktu Registrasi:</label>
                                    <div><?php echo e(setFullDate(date('Y-m-j', strtotime($user->register_at)))); ?> pukul <?php echo e(date('H:i:s', strtotime($user->register_at))); ?></div>
                                </div>
                            </div>
                        </form>
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

<!-- Modal Pilihan -->
<div class="modal fade" id="modalPilihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ganti Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
				<button type="button" class="btn btn-md btn-primary" id="btn-choose-from-gallery">Pilih dari Galeri</button>
				<br><br>atau<br><br>
				<button type="button" class="btn btn-md btn-warning" id="btn-choose-from-computer">Pilih dari Komputer</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Pilihan -->

<!-- Modal Galeri -->
<div class="modal fade" id="modalGaleri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih dari Galeri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="row">
					<?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3 mb-sm-0 text-center">
						<a href="#" class="btn-choose-photo" data-id="<?php echo e($photo->id_pp); ?>">
							<img src="<?php echo e(asset('assets/images/users/'.$photo->photo_name)); ?>" class="img-fluid img-thumbnail">
						</a>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-submit-photo" disabled>Choose</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            <form id="form-choose-photo" class="d-none" method="post" action="/admin/profil/pilih-foto">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id_pp">
            </form>
        </div>
    </div>
</div>
<!-- End Modal Galeri -->

<!-- Modal Croppie -->
<div class="modal fade" id="modalCroppie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crop Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="demo" class="mt-3"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-crop">Crop and Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            <form id="form-profile-image" class="d-none" method="post" action="/admin/profil/update-foto">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="src_image">
            </form>
        </div>
    </div>
</div>
<!-- End Modal Croppie -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script type="text/javascript" src="<?php echo e(asset('assets/plugins/croppie/croppie.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<script type="text/javascript">
    // Button Edit Form Identity
    $(document).on("click", "#btn-edit-identity", function(e){
        $("#form-identity").find("input, select").removeAttr("disabled");
        $("#btn-submit-identity").removeAttr("disabled");
        $(this).fadeOut(1000);
        $("#btn-cancel-editing-identity").fadeIn(1000);
    });

    // Button Cancel Editing Form Identity
    $(document).on("click", "#btn-cancel-editing-identity", function(e){
        $("#form-identity").find("input, select").attr("disabled","disabled");
        $("#btn-submit-identity").attr("disabled","disabled");
        $(this).fadeOut(1000);
        $("#btn-edit-identity").fadeIn(1000);
    });

    // Button Submit Form Identity
    $(document).on("click", "#btn-submit-identity", function(e){
        $("#form-identity").submit();
    });

    $(document).on("click", "#image-overlay", function(e){
        e.preventDefault();
        $("#modalPilihan").modal("show");
    });

	// Pilih dari galeri
    $(document).on("click", "#btn-choose-from-gallery", function(e){
        e.preventDefault();
        $("#modalGaleri").modal("show");
        $("#modalPilihan").modal("hide");
    });

    $(document).on("click", ".btn-choose-photo", function(e){
        e.preventDefault();
		var id = $(this).data("id");
		$(this).find("img").addClass("bg-primary");
		$(".btn-choose-photo").each(function(key,elem){
			var elemId = $(elem).data("id");
			if(elemId != id) $(elem).find("img").removeClass("bg-primary");
		});
		$("input[name=id_pp]").val(id);
		$("#btn-submit-photo").removeAttr("disabled");
    });

    $(document).on("click", "#btn-submit-photo", function(e){
        e.preventDefault();
		$("#form-choose-photo").submit();
    });

	$('#modalGaleri').on('hidden.bs.modal', function(e){
        e.preventDefault();
        $("input[name=id_pp]").val(null);
		$("#btn-submit-photo").attr("disabled","disabled");
		$(".btn-choose-photo").each(function(key,elem){
			$(elem).find("img").removeClass("bg-primary");
		});
	});

    /* Croppie */
    var demo = $('#demo').croppie({
        viewport: {width: 300, height: 300},
        boundary: {width: 400, height: 400}
    });
    var imageURL;

	// Pilih dari Komputer
    $(document).on("click", "#btn-choose-from-computer", function(e){
        e.preventDefault();
        $("#file").trigger("click");
    });

    $(document).on("change", "#file", function(){
        readURL(this);
        $("#modalCroppie").modal("show");
        $("#modalPilihan").modal("hide");
    });

    $('#modalCroppie').on('shown.bs.modal', function(){
        demo.croppie('bind', {
            url: imageURL
        }).then(function(){
            console.log('jQuery bind complete');
        });
    });

    $(document).on("click", "#btn-crop", function(e){
        demo.croppie("result", {
            type: "base64",
            format: "jpeg",
            size: {width: 300, height: 300}
        }).then(function(response){
            $("input[name=src_image]").val(response);
            $("#form-profile-image").submit();
            // $("#image").attr("src", response);
            // $("#modal").modal("hide");
        });
        $("#file").val(null);
    });

	$('#modalCroppie').on('hidden.bs.modal', function(e){
        e.preventDefault();
        $("#file").val(null);
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
    /* End Croppie */
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/plugins/croppie/croppie.css')); ?>">
<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">
<style type="text/css">
    .border-top, .border-bottom {padding: 1.25rem;}
    label {font-weight: 700;}
    .form-control {border-color: #caccce;}
    .input-group-text {border-color: #caccce;}
    #image-overlay {cursor: pointer; position: absolute; top: 0; bottom: 0; left: 0; right: 0; height: 100%; width: 100%; opacity: 0; transition: .5s ease; background-color: rgba(0,0,0,.6); border-radius: .25rem;}
    #image-overlay span {color: white; position: absolute; top: 50%; left: 50%; -webkit-transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%); text-align: center; font-weight: bold;}
    #image-overlay:hover {opacity: 1;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/psikologanda.com/laravel-akademi/resources/views/user/admin/detail-admin.blade.php ENDPATH**/ ?>