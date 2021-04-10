

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
                <h4 class="page-title">Edit Role</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/role">Role</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
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
                    <h5 class="card-title border-bottom">Edit Role</h5>
                    <div class="card-body">
                        <form id="form" method="post" action="/admin/role/update" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

							<input type="hidden" name="id" value="<?php echo e($role->id_role); ?>">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Nama Role <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_role" class="form-control <?php echo e($errors->has('nama_role') ? 'is-invalid' : ''); ?>" value="<?php echo e($role->nama_role); ?>" placeholder="Masukkan Nama Role">
                                    <?php if($errors->has('nama_role')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('nama_role'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Sebagai Admin? <span class="text-danger">*</span></label>
									<div class="row">
										<div class="col-auto">
											<div class="form-check form-check-inline">
												<input class="form-check-input" name="sebagai_admin" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" <?php echo e($role->is_admin == 1 ? 'checked' : ''); ?>>
												<label class="form-check-label" for="inlineRadio1">Ya</label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" name="sebagai_admin" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0" <?php echo e($role->is_admin == 0 ? 'checked' : ''); ?>>
												<label class="form-check-label" for="inlineRadio2">Tidak</label>
											</div>
										</div>
									</div>
                                    <?php if($errors->has('sebagai_admin')): ?>
                                    <div><small class="text-danger"><?php echo e(ucfirst($errors->first('sebagai_admin'))); ?></small></div>
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

<script type="text/javascript">
    // Button Submit
    $(document).on("click", "#btn-submit", function(e){
        $("#form").submit();
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
    .border-top, .border-bottom {padding: 1.25rem;}
    .form-control {border-color: #caccce;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/psikologanda.com/laravel-akademi/resources/views/role/admin/edit.blade.php ENDPATH**/ ?>