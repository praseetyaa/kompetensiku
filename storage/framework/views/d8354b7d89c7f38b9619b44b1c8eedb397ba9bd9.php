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
                <h4 class="page-title">Pengaturan Umum</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/#">Pengaturan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Umum</li>
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
            <div class="col-md-12">
                <!-- card -->
                <div class="card shadow">
                    <h5 class="card-title border-bottom">Pengaturan Umum</h5>
                    <div class="card-body">
                        <form id="form" method="post" action="/admin/pengaturan/update" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="category" value="1">
                            <?php if(Session::get('message') != null): ?>
                            <div class="alert alert-success alert-dismissible mb-4 fade show" role="alert">
                                <?php echo e(Session::get('message')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>
                            <div class="row">
								<?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($settings[$key]->setting_key == 'logo' || $settings[$key]->setting_key == 'icon'): ?>
                                    <div class="form-group col-md-6">
                                        <label><?php echo e($settings[$key]->setting_name); ?> <span class="text-danger"><?php echo e(strpos($settings[$key]->setting_rules, 'required') ? '*' : ''); ?></span></label>
                                        <input type="file" id="<?php echo e($settings[$key]->setting_key); ?>" class="file d-none">
                                        <br>
                                        <button class="btn btn-sm btn-primary btn-upload" data-id="<?php echo e($settings[$key]->setting_key); ?>"><i class="fa fa-folder-open mr-2"></i>Upload</button>
                                        <?php if($settings[$key]->setting_key == 'icon'): ?>
                                        <button class="btn btn-sm btn-secondary btn-preview d-none" data-id="<?php echo e($settings[$key]->setting_key); ?>"><i class="fa fa-eye mr-2"></i>Preview</button>
                                        <?php endif; ?>
                                        <button class="btn btn-sm btn-danger btn-delete d-none" data-id="<?php echo e($settings[$key]->setting_key); ?>"><i class="fa fa-trash mr-2"></i>Hapus</button>
                                        <br>
                                        <input type="hidden" name="settings[<?php echo e($settings[$key]->setting_key); ?>]" class="src" data-id="<?php echo e($settings[$key]->setting_key); ?>" data-old="<?php echo e($settings[$key]->setting_value); ?>" value="<?php echo e($settings[$key]->setting_value); ?>">
                                        <img class="img-thumbnail mt-3" data-id="<?php echo e($settings[$key]->setting_key); ?>" src="<?php echo e(asset('assets/images/logo/'.$settings[$key]->setting_value)); ?>" style="max-height: 250px;">
                                    </div>
                                    <?php else: ?>
                                    <div class="form-group col-md-6">
                                        <label><?php echo e($settings[$key]->setting_name); ?> <span class="text-danger"><?php echo e(is_int(strpos($settings[$key]->setting_rules, 'required')) ? '*' : ''); ?></span></label>
                                        <input type="text" name="settings[<?php echo e($settings[$key]->setting_key); ?>]" class="form-control <?php echo e($errors->has('settings.'.$settings[$key]->setting_key) ? 'border-danger' : ''); ?>" value="<?php echo e($settings[$key]->setting_value); ?>" placeholder="Masukkan <?php echo e($settings[$key]->setting_name); ?>">
                                        <div class="row mt-1">
                                            <?php if($errors->has('settings.'.$settings[$key]->setting_key)): ?>
                                            <small class="col-12 text-danger"><?php echo e(display_errors($settings[$key]->setting_name, $errors->first('settings.'.$settings[$key]->setting_key))); ?></small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<script type="text/javascript">
    // Button Upload
	$(document).on("click", ".btn-upload", function(e){
		e.preventDefault();
        var id = $(this).data("id");
		$("#"+id).trigger("click");
	});

	// File Change
    $(document).on("change", ".file", function(){
		readURL(this);
        $(this).val(null);
    });

    // Read URL
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            var id = $(input).attr("id");
            reader.onload = function(e){
				$(".src[data-id="+id+"]").val(e.target.result);
                $("img[data-id="+id+"]").attr("src",e.target.result).removeClass("d-none");
                $(".btn-preview[data-id="+id+"]").removeClass("d-none");
                $(".btn-delete[data-id="+id+"]").removeClass("d-none");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Button Preview
	$(document).on("click", ".btn-preview", function(e){
		e.preventDefault();
        var id = $(this).data("id");
        if(id == "icon"){
            $(".logo-icon img").attr("src", $("img[data-id="+id+"]").attr("src"));
        }
        else if(id == "logo"){
            $(".logo-text img").attr("src", $("img[data-id="+id+"]").attr("src"));
        }
	});

    // Button Delete
    $(document).on("click", ".btn-delete", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        if(id == "icon"){
            $(".logo-icon img").attr("src", "<?php echo e(asset('assets/images/logo/'.get_icon())); ?>");
            $("img[data-id="+id+"]").attr("src","<?php echo e(asset('assets/images/logo/'.get_icon())); ?>");
        }
        else if(id == "logo"){
            $(".logo-text img").attr("src", "<?php echo e(asset('assets/images/logo/'.get_logo())); ?>");
            $("img[data-id="+id+"]").attr("src","<?php echo e(asset('assets/images/logo/'.get_logo())); ?>");
        }
		$(".src[data-id="+id+"]").val($(".src[data-id="+id+"]").data("old"));
        $(".btn-preview[data-id="+id+"]").addClass("d-none");
        $(".btn-delete[data-id="+id+"]").addClass("d-none");
    });

    // Button Submit
    $(document).on("click", "#btn-submit", function(e){
        $("#form").submit();
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/pengaturan/admin/umum.blade.php ENDPATH**/ ?>