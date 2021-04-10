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
                <h4 class="page-title">Tambah Layanan</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Konten Web</a></li>
                            <li class="breadcrumb-item"><a href="/admin/konten-web/layanan">Layanan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Layanan</li>
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
                    <h5 class="card-title border-bottom">Tambah Layanan</h5>
                    <div class="card-body">
                        <?php if(Session::get('message') != null): ?>
                            <div class="alert alert-success alert-dismissible mb-4 fade show" role="alert">
                                <?php echo e(Session::get('message')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <form id="form" method="post" action="/admin/konten-web/layanan/store" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Layanan <span class="text-danger">*</span></label>
                                    <input type="text" name="layanan" class="form-control <?php echo e($errors->has('layanan') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('layanan')); ?>" placeholder="Masukkan Layanan">
                                    <?php if($errors->has('layanan')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('layanan'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Caption <span class="text-danger">*</span></label>
                                    <textarea name="caption" class="form-control <?php echo e($errors->has('caption') ? 'is-invalid' : ''); ?>" rows="5" placeholder="Masukkan Caption"><?php echo e(old('caption')); ?></textarea>
                                    <?php if($errors->has('caption')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('caption'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Icon <span class="text-danger">*</span></label>
                                    <br>
                                    <button class="btn btn-sm btn-primary btn-search"><i class="fa fa-search mr-2"></i>Cari Icon</button>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 mb-2 mt-3 text-center d-none" id="selected-icon">
                                            <div class="card card-hover shadow bg-warning">
                                                <div class="card-body">
                                                    <i class=""></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="icon">
                                    <?php if($errors->has('icon')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('icon'))); ?></small>
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

<!-- Modal -->
<div class="modal fade" id="modalIcon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Icon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row icons">
                    <?php $__currentLoopData = $icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="col-md-3 col-sm-6 mb-2 text-center icon" href="#" data-id="<?php echo e($icon); ?>">
                            <div class="card card-hover shadow bg-warning">
                                <div class="card-body">
                                    <i class="fa-3x <?php echo e($icon); ?>"></i>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <!-- <div class="modal-footer">
				<button type="button" class="btn btn-md btn-success" id="btn-choose" disabled>Pilih</button>
			</div> -->
        </div>
    </div>
</div>
<!-- End Modal -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script type="text/javascript">
    // Button Search Icon
    $(document).on("click", ".btn-search", function(e){
        e.preventDefault();
        $("#modalIcon").modal("show");
    });

    // Button Choose Icon
    $(document).on("click", ".icon", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        $("#selected-icon").find("i").attr("class","").addClass("fa-3x "+id);
        $("#selected-icon").removeClass("d-none");
        $("input[name=icon]").val(id);
        $("#modalIcon").modal("toggle");
    });

    // Button Submit
    $(document).on("click", "#btn-submit", function(e){
        $("#form").submit();
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
    .icons {height: 500px; overflow-y: scroll;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/layanan/admin/create.blade.php ENDPATH**/ ?>