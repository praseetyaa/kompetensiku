

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
                <h4 class="page-title">Profil</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/member">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profil</li>
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
                        <div class="card card-hover bg-cyan shadow">
                            <div class="card-body text-center">
                                <h4>URL Referral</h4>
                                <p class="mb-0 h5"><a class="text-light font-weight-bold" href="<?php echo e(URL::to('/')); ?>?ref=<?php echo e(Auth::user()->username); ?>" target="_blank"><?php echo e(URL::to('/')); ?>?ref=<?php echo e(Auth::user()->username); ?></a></p>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card card-hover bg-warning shadow">
                            <div class="card-body text-center">
                                <h4>Total Saldo Anda Saat Ini</h4>
                                <p class="mb-0 h3 font-weight-bold <?php echo e(Auth::user()->saldo >= minWithdrawal() ? 'text-primary' : 'text-danger'); ?>">Rp. <?php echo e(number_format(Auth::user()->saldo,0,',','.')); ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                </div>
                <!-- row -->
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-4">
                <!-- row -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
						<!-- card -->
						<div class="card shadow">
							<h5 class="card-title border-bottom">Identitas Diri</h5>
							<div class="card-body">
								<form id="form-identity" method="post" action="/member/profil/update-profil">
									<?php echo e(csrf_field()); ?>

									<?php if(Session::get('updateProfile') != null): ?>
									<div class="alert alert-success alert-dismissible mb-4 fade show" role="alert">
										<?php echo e(Session::get('updateProfile')); ?>

										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<?php endif; ?>
                                    <div class="alert alert-primary text-center mb-4" role="alert">
                                        <strong>Username: </strong><?php echo e($user->username); ?>

                                    </div>
									<div class="row">
										<div class="form-group col-md-12">
											<label>Nama Lengkap <span class="text-danger">*</span></label>
											<input type="text" name="nama_lengkap" class="form-control <?php echo e($errors->has('nama_lengkap') ? 'is-invalid' : ''); ?>" value="<?php echo e($user->nama_user); ?>" placeholder="Masukkan Nama Lengkap" disabled>
											<?php if($errors->has('nama_lengkap')): ?>
											<small class="text-danger"><?php echo e(ucfirst($errors->first('nama_lengkap'))); ?></small>
											<?php endif; ?>
										</div>
                                        <div class="form-group col-md-12">
                                            <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                            <input type="text" name="tanggal_lahir" class="form-control <?php echo e($errors->has('tanggal_lahir') ? 'is-invalid' : ''); ?>" value="<?php echo e($user->tanggal_lahir); ?>" placeholder="Masukkan Tanggal Lahir" disabled>
                                            <?php if($errors->has('tanggal_lahir')): ?>
                                            <small class="text-danger"><?php echo e(ucfirst($errors->first('tanggal_lahir'))); ?></small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                            <select name="jenis_kelamin" class="form-control <?php echo e($errors->has('jenis_kelamin') ? 'is-invalid' : ''); ?>" disabled>
                                                <option value="" disabled selected>--Pilih--</option>
                                                <option value="L" <?php echo e($user->jenis_kelamin == 'L' ? 'selected' : ''); ?>>Laki-Laki</option>
                                                <option value="P" <?php echo e($user->jenis_kelamin == 'P' ? 'selected' : ''); ?>>Perempuan</option>
                                            </select>
                                            <?php if($errors->has('jenis_kelamin')): ?>
                                            <small class="text-danger"><?php echo e(ucfirst($errors->first('jenis_kelamin'))); ?></small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Nomor HP <span class="text-danger">*</span></label>
                                            <input type="text" name="nomor_hp" class="form-control <?php echo e($errors->has('nomor_hp') ? 'is-invalid' : ''); ?>" value="<?php echo e($user->nomor_hp); ?>" placeholder="Masukkan Nomor HP" disabled>
                                            <?php if($errors->has('nomor_hp')): ?>
                                            <small class="text-danger"><?php echo e(ucfirst($errors->first('nomor_hp'))); ?></small>
                                            <?php endif; ?>
                                        </div>
										<div class="form-group col-md-12">
											<label>Email <span class="text-danger">*</span></label>
											<input type="email" name="email" class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" value="<?php echo e($user->email); ?>" placeholder="Masukkan Email" disabled>
											<?php if($errors->has('email')): ?>
											<small class="text-danger"><?php echo e(ucfirst($errors->first('email'))); ?></small>
											<?php endif; ?>
										</div>
										<div class="form-group col-md-12">
											<label>Password</label>
											<input type="password" name="password" class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Password" disabled>
											<?php if($errors->has('password')): ?>
											<small class="text-danger"><?php echo e(ucfirst($errors->first('password'))); ?></small>
											<?php else: ?>
											<small class="text-muted">Kosongi saja jika tidak ingin mengganti password.</small>
											<?php endif; ?>
										</div>
									</div>
								</form>
							</div>
							<div class="border-top">
								<button id="btn-edit-identity" type="button" class="btn btn-primary">Edit</button>
								<button id="btn-submit-identity" type="submit" class="btn btn-success" disabled>Simpan</button>
								<button id="btn-cancel-editing-identity" type="button" class="btn btn-danger" style="display: none;">Batal</button>
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
                    <!-- column -->
                    <div class="col-lg-12">
                        <!-- card -->
                        <div class="card shadow">
                            <h5 class="card-title border-bottom">Status Akun</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Sponsor:</label>
                                        <div><?php echo e($sponsor != null ? $sponsor->nama_user : '-'); ?></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Refer:</label>
                                        <div><?php echo e(count($refer)); ?> orang</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Login Terakhir:</label>
                                        <div>
											<?php if(Auth::user()->last_visit != null): ?>
												<?php echo e(setFullDate(date('Y-m-j', strtotime(Auth::user()->last_visit)))); ?> pukul <?php echo e(date('H:i:s', strtotime(Auth::user()->last_visit))); ?>

											<?php else: ?>
												-
											<?php endif; ?>
										</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Waktu Registrasi:</label>
                                        <div><?php echo e(setFullDate(date('Y-m-j', strtotime(Auth::user()->register_at)))); ?> pukul <?php echo e(date('H:i:s', strtotime(Auth::user()->register_at))); ?></div>
                                    </div>
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
				<button type="button" class="btn btn-md btn-primary" id="btn-choose-from-gallery" <?php echo e(count($photos) <= 0 ? 'disabled' : ''); ?>>Pilih dari Galeri</button>
				<br><br>atau<br><br>
				<button type="button" class="btn btn-md btn-warning" id="btn-choose-from-computer">Pilih dari Perangkat Anda</button>
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
				<p class="text-center">Klik untuk memilih foto.</p>
				<div class="row">
					<?php if(count($photos)>0): ?>
						<?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3 mb-sm-0 text-center">
							<a href="#" class="btn-choose-photo" data-id="<?php echo e($photo->id_pp); ?>">
								<img src="<?php echo e(asset('assets/images/users/'.$photo->photo_name)); ?>" class="img-fluid img-thumbnail">
							</a>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-submit-photo" disabled>Pilih</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
            <form id="form-choose-photo" class="d-none" method="post" action="/member/profil/pilih-foto">
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
				<div class="table-responsive">
                	<div id="demo" class="mt-3"></div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-crop">Crop and Save</button>
                <button type="button" class="btn btn-danger" id="btn-cancel" data-dismiss="modal">Batal</button>
            </div>
            <form id="form-profile-image" class="d-none" method="post" action="/member/profil/update-foto">
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
    // Datepicker
    $(document).ready(function(){
        $("input[name=tanggal_lahir]").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
    
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
	.modal {overflow-y: auto;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/member/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/psikologanda.com/laravel-akademi/resources/views/user/member/profile.blade.php ENDPATH**/ ?>