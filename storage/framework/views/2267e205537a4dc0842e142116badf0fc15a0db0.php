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
                <h4 class="page-title">Request</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/member">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Request</li>
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
                    <h5 class="card-title border-bottom">Request</h5>
                    <div class="card-body">
                        <?php if(count($request_internal) <= 0): ?>
                            <div class="alert alert-warning text-center mb-4">Request Aktivasi Akun Anda di bawah ini jika Anda merupakan anggota internal perusahaan ini.</div>
                            <form id="form" method="post" action="/member/request" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" name="nama_lengkap" class="form-control <?php echo e($errors->has('nama_lengkap') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('nama_lengkap')); ?>" placeholder="Masukkan Nama Lengkap">
                                        <?php if($errors->has('nama_lengkap')): ?>
                                        <small class="text-danger"><?php echo e(ucfirst($errors->first('nama_lengkap'))); ?></small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Kode Request <span class="text-danger">*</span></label>
                                        <input type="text" name="kode_request" class="form-control <?php echo e($errors->has('kode_request') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('kode_request')); ?>" placeholder="Masukkan Kode Request">
                                        <?php if($errors->has('kode_request')): ?>
                                        <small class="text-danger"><?php echo e(ucfirst($errors->first('kode_request'))); ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>
                        <?php else: ?>
                            <div class="alert alert-success text-center">Anda sudah melakukan request sebagai anggota internal perusahaan ini. Mohon tunggu sampai Admin memverifikasi datanya.</div>
                        <?php endif; ?>
                    </div>
                    <?php if(count($request_internal) <= 0): ?>
                        <div class="border-top">
                            <button id="btn-submit" type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    <?php endif; ?>
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
<?php echo $__env->make('template/member/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\campusdigital\resources\views/request/member/request.blade.php ENDPATH**/ ?>