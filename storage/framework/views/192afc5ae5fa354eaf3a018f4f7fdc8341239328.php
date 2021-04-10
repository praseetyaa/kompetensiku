

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
                            <li class="breadcrumb-item"><a href="/member">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Afiliasi</a></li>
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
								<button class="btn btn-warning btn-sm btn-copy" data-id="<?php echo e($data->id_script); ?>" type="button" data-toggle="tooltip" data-placement="top" title="Salin Teks"><i class="fa fa-copy mr-2"></i>Salin Teks</button>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/member/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-v3/resources/views/script/member/index.blade.php ENDPATH**/ ?>