

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
                <h4 class="page-title">Pengaturan E-Sertifikat</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/#">Pengaturan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">E-Sertifikat</li>
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
            <div class="col-md-6 mx-md-auto">
                <!-- card -->
                <div class="card shadow">
                    <h5 class="card-title border-bottom">Pengaturan E-Sertifikat</h5>
                    <div class="card-body">
                        <form id="form" method="post" action="/admin/pengaturan/update">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="category" value="4">
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
                                    <?php if($settings[$key]->setting_key == 'kode_untuk_sertifikat'): ?>
                                    <div class="form-group col-md-12">
                                        <label><?php echo e($settings[$key]->setting_name); ?> <span class="text-danger"><?php echo e(is_int(strpos($settings[$key]->setting_rules, 'required')) ? '*' : ''); ?></span></label>
                                        <input type="text" name="settings[<?php echo e($settings[$key]->setting_key); ?>]" class="form-control <?php echo e($errors->has('settings.'.$settings[$key]->setting_key) ? 'border-danger' : ''); ?>" value="<?php echo e($settings[$key]->setting_value); ?>" placeholder="Masukkan <?php echo e($settings[$key]->setting_name); ?>">
                                        <div class="row mt-1">
                                            <div class="col-12 small text-muted">Kode ini digunakan untuk membuat Nomor Sertifikat, Nomor Trainer Pelatihan, serta Nomor Peserta Pelatihan</div>
                                            <?php if($errors->has('settings.'.$settings[$key]->setting_key)): ?>
                                            <div class="col-12 small text-danger"><?php echo e(display_errors($settings[$key]->setting_name, $errors->first('settings.'.$settings[$key]->setting_key))); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="form-group col-md-12">
                                        <label><?php echo e($settings[$key]->setting_name); ?> <span class="text-danger"><?php echo e(is_int(strpos($settings[$key]->setting_rules, 'required')) ? '*' : ''); ?></span></label>
                                        <input type="text" name="settings[<?php echo e($settings[$key]->setting_key); ?>]" class="form-control colorpicker <?php echo e($errors->has('settings.'.$settings[$key]->setting_key) ? 'border-danger' : ''); ?>" id="<?php echo e($settings[$key]->setting_key); ?>" value="<?php echo e($settings[$key]->setting_value); ?>" placeholder="Masukkan <?php echo e($settings[$key]->setting_name); ?>">
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

<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/jquery-asColor/dist/jquery-asColor.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/jquery-asGradient/dist/jquery-asGradient.js')); ?>"></script>
<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/jquery-minicolors/jquery.minicolors.min.js')); ?>"></script>
<script type="text/javascript">
    // Colorpicker
    $(".colorpicker").each(function(){
        $(this).minicolors({
            control: $(this).attr('data-control') || 'hue',
            position: $(this).attr('data-position') || 'bottom left',
            change: function(value, opacity) {
                if (!value) return;
                var color = value;
                if (opacity) value += ', ' + opacity;
                if (typeof console === 'object') {
                    var id = $(this).attr("id");
                    if(id == "warna_primer") $("#navbarSupportedContent").attr("style", "background:"+color+"!important");
                    else if(id == "warna_sekunder") $(".navbar-header[data-logobg=skin5]").attr("style", "background:"+color+"!important");
                    else if(id == "warna_tersier") $("#main-wrapper .left-sidebar[data-sidebarbg=skin5], #main-wrapper .left-sidebar[data-sidebarbg=skin5] ul").attr("style", "background:"+color+"!important");
                    else if(id == "warna_scroll_track") document.styleSheets[2].addRule("::-webkit-scrollbar-track", "background: "+color+";");
                    else if(id == "warna_scroll_thumb") document.styleSheets[2].addRule("::-webkit-scrollbar-thumb", "background: "+color+";");
                    // console.log(value);
                }
            },
            theme: 'bootstrap'
        });
    });
    
    // Button Submit
    $(document).on("click", "#btn-submit", function(e){
        $("#form").submit();
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('templates/matrix-admin/assets/libs/jquery-minicolors/jquery.minicolors.css')); ?>">

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-v3/resources/views/pengaturan/admin/e-sertifikat.blade.php ENDPATH**/ ?>