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
                <h4 class="page-title">Tambah Platform Pembayaran</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pengaturan</a></li>
                            <li class="breadcrumb-item"><a href="/admin/pengaturan/platform">Platform Pembayaran</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Platform Pembayaran</li>
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
                    <h5 class="card-title border-bottom">Tambah Platform Pembayaran</h5>
                    <div class="card-body">
                        <form id="form" method="post" action="/admin/pengaturan/platform/store" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Nama Platform <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_platform" class="form-control <?php echo e($errors->has('nama_platform') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('nama_platform')); ?>" placeholder="Masukkan Nama Platform">
                                    <?php if($errors->has('nama_platform')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('nama_platform'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Tipe Platform <span class="text-danger">*</span></label>
                                    <select name="tipe_platform" class="form-control <?php echo e($errors->has('tipe_platform') ? 'is-invalid' : ''); ?>">
										<option value="" disabled selected>--Pilih Tipe Platform--</option>
										<option value="1" <?php echo e(old('tipe_platform') == 1 ? 'selected' : ''); ?>>Bank</option>
										<option value="2" <?php echo e(old('tipe_platform') == 2 ? 'selected' : ''); ?>>Fintech</option>
									</select>
                                    <?php if($errors->has('tipe_platform')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('tipe_platform'))); ?></small>
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
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/platform/admin/create.blade.php ENDPATH**/ ?>