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
                <h4 class="page-title">Edit Chapter</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/e-course">Materi E-Course</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Chapter</li>
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
                    <h5 class="card-title border-bottom">Edit Chapter</h5>
                    <div class="card-body">
                        <form id="form" method="post" action="/admin/e-course/update-chapter" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($chapter->id_cc); ?>">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Nomor <span class="text-danger">*</span></label>
                                    <select name="chapter_nomor" class="form-control <?php echo e($errors->has('chapter_nomor') ? 'is-invalid' : ''); ?>">
										<option value="" disabled selected>--Pilih Nomor Chapter--</option>
                                        <?php for($i=0; $i<=20; $i++): ?>
										<option value="<?php echo e($i); ?>" <?php echo e($chapter->chapter_nomor == $i ? 'selected' : ''); ?> <?php echo e(in_array($i, $array) ? 'disabled' : ''); ?>>Chapter #<?php echo e($i); ?></option>
                                        <?php endfor; ?>
									</select>
                                    <?php if($errors->has('chapter_nomor')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('chapter_nomor'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Judul <span class="text-danger">*</span></label>
                                    <input type="text" name="judul" class="form-control <?php echo e($errors->has('judul') ? 'is-invalid' : ''); ?>" value="<?php echo e($chapter->chapter_judul); ?>" placeholder="Masukkan Judul">
                                    <?php if($errors->has('judul')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('judul'))); ?></small>
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
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/course/admin/edit-chapter.blade.php ENDPATH**/ ?>