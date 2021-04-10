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
                <h4 class="page-title">Tambah Pelatihan</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/member">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/pelatihan">Pelatihan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Pelatihan</li>
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
                    <h5 class="card-title border-bottom">Tambah Pelatihan</h5>
                    <div class="card-body">
                        <form id="form" method="post" action="/admin/pelatihan/store">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
								<div class="form-group col-md-6">
									<label>Nama Pelatihan <span class="text-danger">*</span></label>
									<input type="text" name="nama_pelatihan" class="form-control <?php echo e($errors->has('nama_pelatihan') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('nama_pelatihan')); ?>" placeholder="Masukkan Nama Pelatihan">
									<?php if($errors->has('nama_pelatihan')): ?>
									<small class="text-danger"><?php echo e(ucfirst($errors->first('nama_pelatihan'))); ?></small>
									<?php endif; ?>
								</div>
								<div class="form-group col-md-6">
									<label>Kategori <span class="text-danger">*</span></label>
									<select name="kategori" class="form-control <?php echo e($errors->has('kategori') ? 'is-invalid' : ''); ?>" >
										<option value="" disabled selected>--Pilih--</option>
										<?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($data->id_kp); ?>" <?php echo e(old('kategori') == $data->id_kp ? 'selected' : ''); ?>><?php echo e($data->kategori); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
									<?php if($errors->has('kategori')): ?>
									<small class="text-danger"><?php echo e(ucfirst($errors->first('kategori'))); ?></small>
									<?php endif; ?>
								</div>
								<div class="form-group col-md-12">
									<label>Trainer <span class="text-danger">*</span></label>
									<select name="trainer" class="form-control <?php echo e($errors->has('trainer') ? 'is-invalid' : ''); ?>">
										<option value="" disabled selected>--Pilih--</option>
										<?php $__currentLoopData = $mentor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($data->id_user); ?>" <?php echo e(old('trainer') == $data->id_user ? 'selected' : ''); ?>><?php echo e($data->nama_user); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
									<?php if($errors->has('trainer')): ?>
									<small class="text-danger"><?php echo e(ucfirst($errors->first('trainer'))); ?></small>
									<?php endif; ?>
								</div>
								<div class="form-group col-md-6">
									<label>Tempat Pelatihan</label>
									<input type="text" name="tempat_pelatihan" class="form-control <?php echo e($errors->has('tempat_pelatihan') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('tempat_pelatihan')); ?>" placeholder="Masukkan Tempat Pelatihan">
									<?php if($errors->has('tempat_pelatihan')): ?>
									<small class="text-danger"><?php echo e(ucfirst($errors->first('tempat_pelatihan'))); ?></small>
									<?php endif; ?>
								</div>
								<div class="form-group col-md-6">
									<label>Waktu Pelatihan <span class="text-danger">*</span></label>
									<input type="text" name="tanggal_pelatihan" class="form-control <?php echo e($errors->has('tanggal_pelatihan') ? 'border-danger' : ''); ?>" placeholder="Masukkan Tanggal Pelatihan">
									<?php if($errors->has('tanggal_pelatihan')): ?>
									<div class="small text-danger mt-1"><?php echo e(ucfirst($errors->first('tanggal_pelatihan'))); ?></div>
									<?php endif; ?>
								</div>
                                <div class="form-group col-md-6">
                                    <label>Fee Member <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text <?php echo e($errors->has('fee_member') ? 'border-danger' : ''); ?>">Rp.</span>
                                        </div>
                                        <input type="text" name="fee_member" class="form-control number-only thousand-format <?php echo e($errors->has('fee_member') ? 'border-danger' : ''); ?>" value="<?php echo e(old('fee_member')); ?>" placeholder="Masukkan Fee Member">
                                    </div>
                                    <div class="row mt-1">
                                        <?php if($errors->has('fee_member')): ?>
                                        <small class="col-12 text-danger"><?php echo e(ucfirst($errors->first('fee_member'))); ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fee Umum <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text <?php echo e($errors->has('fee_umum') ? 'border-danger' : ''); ?>">Rp.</span>
                                        </div>
                                        <input type="text" name="fee_umum" class="form-control number-only thousand-format <?php echo e($errors->has('fee_umum') ? 'border-danger' : ''); ?>" value="<?php echo e(old('fee_umum')); ?>" placeholder="Masukkan Fee Umum">
                                    </div>
                                    <div class="row mt-1">
                                        <?php if($errors->has('fee_umum')): ?>
                                        <small class="col-12 text-danger"><?php echo e(ucfirst($errors->first('fee_umum'))); ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Materi <span class="text-danger">*</span></label>
									<br>
									<button class="btn btn-sm btn-primary btn-add" title="Tambah"><i class="fa fa-plus mr-2"></i>Tambah Materi</button>
									<div class="table-responsive mt-2">
										<table class="table table-bordered" id="table-materi">
											<tbody>
												<tr data-id="1">
													<td><input type="text" name="kode_unit[]" class="form-control kode-unit" data-id="1" placeholder="Kode Unit"></td>
													<td><input type="text" name="judul_unit[]" class="form-control judul-unit" data-id="1" placeholder="Judul Unit"></td>
													<td width="150"><input type="text" name="durasi[]" class="form-control number-only durasi" data-id="1" placeholder="Durasi (Jam)"></td>
													<td width="50"><button class="btn btn-danger btn-block btn-delete d-none" data-id="1" title="Hapus"><i class="fa fa-trash"></i></button></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
                                <div class="form-group col-md-12">
                                    <label>Deskripsi <span class="text-danger">*</span></label>
                                    <textarea name="deskripsi" id="deskripsi" class="d-none"></textarea>
                                    <div id="editor"></div> 
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

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		// Daterangepicker
		$("input[name=tanggal_pelatihan]").daterangepicker({
			timePicker: true,
			timePicker24Hour: true,
    		showDropdowns: true,
			startDate: "<?php echo e(date('d/m/Y H:i')); ?>",
			endDate: "<?php echo e(date('d/m/Y H:i')); ?>",
			locale: {
			  format: 'DD/MM/YYYY HH:mm'
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
	});

	// Input Hanya Nomor
	$(document).on("keypress", ".number-only", function(e){
		var charCode = (e.which) ? e.which : e.keyCode;
		if ((charCode >= 48 && charCode <= 57) || (charCode==190 || charCode==110 || charCode==46)) { 
			// 0-9, and . only
			return true;
		}
		else{
			return false;
		}
	});
	// End Input Hanya Nomor
	
	// Button Tambah Materi
	$(document).on("click", ".btn-add", function(e){
		e.preventDefault();
		var count = $("#table-materi tbody tr").length;
		var html = '';
		html += '<tr data-id="'+(count+1)+'">';
		html += '<td><input type="text" name="kode_unit[]" class="form-control kode-unit" data-id="'+(count+1)+'" placeholder="Kode Unit"></td>';
		html += '<td><input type="text" name="judul_unit[]" class="form-control judul-unit" data-id="'+(count+1)+'" placeholder="Judul Unit"></td>';
		html += '<td width="150"><input type="text" name="durasi[]" class="form-control number-only durasi" data-id="'+(count+1)+'" placeholder="Durasi (Jam)"></td>';
		html += '<td width="50"><button class="btn btn-danger btn-block btn-delete" data-id="'+(count+1)+'" title="Hapus"><i class="fa fa-trash"></i></button></td>';
		html += '</tr>';
		$("#table-materi tbody").append(html);
		var rows = $("#table-materi tbody tr");
		rows.each(function(key,elem){
			$(elem).find(".btn-delete").removeClass("d-none")
		});
	});
	
	// Button Hapus Materi
	$(document).on("click", ".btn-delete", function(e){
		e.preventDefault();
		var id = $(this).data("id");
		$("#table-materi tbody tr[data-id="+id+"]").remove();
		var rows = $("#table-materi tbody tr");
		rows.each(function(key,elem){
			rows.length <= 1 ? $(elem).find(".btn-delete").addClass("d-none") : $(elem).find(".btn-delete").removeClass("d-none");		
			$(elem).attr("data-id", (key+1));
			$(elem).find(".kode-unit").attr("data-id", (key+1));
			$(elem).find(".judul-unit").attr("data-id", (key+1));
			$(elem).find(".durasi").attr("data-id", (key+1));
			$(elem).find(".btn-delete").attr("data-id", (key+1));
		});
	});
	
	
    // Button Submit
    $(document).on("click", "#btn-submit", function(e){
		e.preventDefault();
		
		// Cek Materi
		var rows = $("#table-materi tbody tr");
		if(rows.length == 1){
			if($(rows).find(".kode-unit").val() == '' || $(rows).find(".judul-unit").val() == '' || $(rows).find(".durasi").val() == '' ){
				alert("Materi harus diisi minimal 1 (satu) !");
				return;
			}
		}
		
        var myEditor = document.querySelector('#editor');
        var html = myEditor.children[0].innerHTML;
        $("#deskripsi").text(html);
        $("#form").submit();
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style type="text/css">
	#platform {width: 200px; height: 250px; overflow-y: scroll; overflow-x: hidden;}
    #editor {height: 400px;}
	.ql-editor h1, .ql-editor h2, .ql-editor h3, .ql-editor h4, .ql-editor h5, .ql-editor h6, .ql-editor p {margin-bottom: 1rem!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/pelatihan/admin/create.blade.php ENDPATH**/ ?>