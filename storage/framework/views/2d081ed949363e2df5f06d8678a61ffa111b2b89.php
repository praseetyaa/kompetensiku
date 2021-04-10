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
                <h4 class="page-title">Script Jualan</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Script Jualan</li>
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
				<?php if(Session::get('message') != null): ?>
				<div class="alert alert-success alert-dismissible mb-4 fade show" role="alert">
					<?php echo e(Session::get('message')); ?>

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php endif; ?>
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add-script"><i class="fa fa-plus mr-2"></i> Tambah Script</a>
                <!-- card -->
				<div id="accordian-4">
					<div class="card m-t-30 shadow">
						<?php $__currentLoopData = $script; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<a class="card-header link" data-toggle="collapse" data-parent="#accordian-4" href="#Toggle-<?php echo e($data->id_script); ?>" aria-expanded="true" aria-controls="Toggle-<?php echo e($data->id_script); ?>" style="border-top: 1px solid #ebebeb;">
							<i class="fa fa-arrow-right mr-2" aria-hidden="true"></i>
							<span class="h4" data-id="<?php echo e($data->id_script); ?>"><?php echo e($data->script_title); ?></span>
						</a>
						<div id="Toggle-<?php echo e($data->id_script); ?>" class="collapse multi-collapse <?php echo e($data->id_script == 1 ? 'show' : ''); ?>">
							<div class="card-body widget-content">
								<textarea class="form-control" rows="25" data-id="<?php echo e($data->id_script); ?>" id="text-<?php echo e($data->id_script); ?>" readonly><?php echo html_entity_decode($data->script); ?></textarea>
							</div>
							<div class="card-footer">
								<button class="btn btn-success btn-sm btn-edit" data-id="<?php echo e($data->id_script); ?>"><i class="fa fa-edit mr-2"></i>Edit</button>
								<button class="btn btn-danger btn-sm btn-delete" data-id="<?php echo e($data->id_script); ?>"><i class="fa fa-trash mr-2"></i>Hapus</button>
								<button class="btn btn-warning btn-sm btn-copy" data-id="<?php echo e($data->id_script); ?>" type="button" data-toggle="tooltip" data-placement="top" title="Salin Teks"><i class="fa fa-copy mr-2"></i>Salin Teks</button>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<form id="form-delete-script" class="d-none" method="post" action="/admin/script/delete">
							<?php echo e(csrf_field()); ?>

							<input type="hidden" name="id" id="id-script">
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

<!-- Modal Add Script -->
<div class="modal fade" id="modal-add-script" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Script</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-script" method="post" action="/admin/script/store">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Judul Script <span class="text-danger">*</span></label>
                            <input type="text" name="judul_script" class="form-control <?php echo e($errors->has('judul_script') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Judul Script" value="<?php echo e(old('judul_script')); ?>">
                            <?php if($errors->has('judul_script')): ?>
                            <small class="text-danger"><?php echo e(ucfirst($errors->first('judul_script'))); ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Script <span class="text-danger">*</span></label>
                            <textarea name="script" class="form-control <?php echo e($errors->has('script') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Script" rows="5"></textarea>
                            <?php if($errors->has('script')): ?>
                            <small class="text-danger"><?php echo e(ucfirst($errors->first('script'))); ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-submit-add-script">Simpan</button>
                <button type="button" class="btn btn-danger"data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Add Script -->

<!-- Modal Edit Script -->
<div class="modal fade" id="modal-edit-script" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Script</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-script" method="post" action="/admin/script/update">
                    <?php echo e(csrf_field()); ?>

					<input type="hidden" name="id">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Judul Script <span class="text-danger">*</span></label>
                            <input type="text" name="judul_script" class="form-control <?php echo e($errors->has('judul_script') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Judul Script" value="<?php echo e(old('judul_script')); ?>">
                            <?php if($errors->has('judul_script')): ?>
                            <small class="text-danger"><?php echo e(ucfirst($errors->first('judul_script'))); ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Script <span class="text-danger">*</span></label>
                            <textarea name="script" class="form-control <?php echo e($errors->has('script') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Script" rows="5"></textarea>
                            <?php if($errors->has('script')): ?>
                            <small class="text-danger"><?php echo e(ucfirst($errors->first('script'))); ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-submit-edit-script">Simpan</button>
                <button type="button" class="btn btn-danger"data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit Script -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script type="text/javascript">
	// Button Copy to Clipboard
    $(document).on("click", ".btn-copy", function(e){
		e.preventDefault();
		var id = $(this).data("id");
		var copyText = document.getElementById("text-"+id);
		copyText.select();
		copyText.setSelectionRange(0, 999999);
		console.log(document.execCommand("copy"));
		$(this).attr('data-original-title','Berhasil Menyalin Teks!');
		$(this).tooltip("show");
		$(this).attr('data-original-title','Salin Teks');
    })
	
	// Button Submit Add Script
	$(document).on("click", "#btn-submit-add-script", function(e){
		e.preventDefault();
		$("#form-add-script").submit();
	});
	
	// Button Edit Script
	$(document).on("click", ".btn-edit", function(e){
		e.preventDefault();
		var id = $(this).data("id");
		var title = $(".card-header .h4[data-id="+id+"]").text();
		var text = $(".widget-content textarea[data-id="+id+"]").text();
		$("#modal-edit-script").find("input[name=id]").val(id);
		$("#modal-edit-script").find("input[name=judul_script]").val(title);
		$("#modal-edit-script").find("textarea[name=script]").val(text);
		$("#modal-edit-script").modal("show");
	});
	
	// Button Submit Edit Script
	$(document).on("click", "#btn-submit-edit-script", function(e){
		e.preventDefault();
		$("#form-edit-script").submit();
	});

    // Button Delete Script
    $(document).on("click", ".btn-delete", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var ask = confirm("Anda yakin ingin menghapus data ini?");
        if(ask){
            $("#id-script").val(id);
            $("#form-delete-script").submit();
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/script/admin/index.blade.php ENDPATH**/ ?>