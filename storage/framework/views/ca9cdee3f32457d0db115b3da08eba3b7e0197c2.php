

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
                <h4 class="page-title">Data Paket</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/paket">Paket</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Paket</li>
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
        <!-- row -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-lg-12">
                <!-- card -->
                <div class="card shadow">
                    <div class="card-title border-bottom">
                        <div class="row">
                            <div class="col-12 col-sm py-1 mb-2 mb-sm-0 text-center text-sm-left">
                                <h5 class="mb-0">Data Paket</h5>
                            </div>
							<?php if(count($paket) < 2): ?>
                            <div class="col-12 col-sm-auto text-center text-sm-left">
                                <a href="/admin/paket/create" class="btn btn-sm btn-primary"><i class="fa fa-plus mr-2"></i> Tambah Paket</a>
                            </div>
							<?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(Session::get('message') != null): ?>
                            <div class="alert alert-success alert-dismissible mb-4 fade show" role="alert">
                                <?php echo e(Session::get('message')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table id="table-paket" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="40">No.</th>
                                        <th>Nama Paket</th>
                                        <th width="150">Harga</th>
                                        <th width="150">Bisa Ambil Komisi</th>
                                        <th width="40">Edit</th>
                                        <th width="40">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $paket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                        <td><?php echo e($data->nama_paket); ?></td>
                                        <td>Rp. <?php echo e(number_format($data->harga_paket,0,'.','.')); ?></td>
                                        <td><strong class="<?php echo e($data->bisa_ambil_komisi == 1 ? 'text-success' : 'text-danger'); ?>"><?php echo e($data->bisa_ambil_komisi == 1 ? 'Ya' : 'Tidak'); ?></strong></td>
                                        <td><a href="/admin/paket/edit/<?php echo e($data->id_paket); ?>" class="btn btn-warning btn-sm btn-block" title="Edit"><i class="fa fa-edit"></i></a></td>
                                        <td><a href="#" class="btn btn-danger btn-sm btn-block btn-delete-paket" data-id="<?php echo e($data->id_paket); ?>" title="Hapus"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <form id="form-paket" class="d-none" method="post" action="/admin/paket/delete">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id" id="id-paket">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-12">
                <!-- card -->
                <div class="card shadow">
                    <div class="card-title border-bottom">
                        <div class="row">
                            <div class="col-12 col-sm py-1 mb-2 mb-sm-0 text-center text-sm-left">
                                <h5 class="mb-0">Data Pembayaran Paket</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(Session::get('message2') != null): ?>
                            <div class="alert alert-success alert-dismissible mb-4 fade show" role="alert">
                                <?php echo e(Session::get('message2')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table id="table-pembayaran-paket" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="40">No.</th>
                                        <th>Nama User</th>
                                        <th>Nama Paket</th>
                                        <th width="150">Status</th>
                                        <th width="40">Bukti</th>
                                        <th width="40">Verifikasi</th>
                                        <th width="40">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                        <td><?php echo e($data->nama_user); ?></td>
                                        <td><?php echo e($data->nama_paket); ?></td>
                                        <td><strong class="<?php echo e($data->ppt_status == 1 ? 'text-success' : 'text-danger'); ?>"><?php echo e($data->ppt_status == 1 ? 'Sudah Verifikasi' : 'Belum Diverifikasi'); ?></strong></td>
                                        <td><a href="<?php echo e(asset('assets/images/ppt-proof/'.$data->ppt_proof)); ?>" class="btn btn-warning btn-sm btn-block el-link image-popup-vertical-fit" data-id="<?php echo e($data->id_ppt); ?>" title="Bukti Pembayaran"><i class="fa fa-image"></i></a></td>
                                        <td><a href="#" class="btn btn-success btn-sm btn-block <?php echo e($data->ppt_status == 0 ? 'btn-verify' : ''); ?>" data-id="<?php echo e($data->id_ppt); ?>" title="Verifikasi" style="<?php echo e($data->ppt_status == 1 ? 'cursor:not-allowed' : ''); ?>"><i class="fa fa-check"></i></a></td>
                                        <td><a href="#" class="btn btn-danger btn-sm btn-block btn-delete-payment" data-id="<?php echo e($data->id_ppt); ?>" title="Hapus"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <form id="form-verify" class="d-none" method="post" action="/admin/paket/verify">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id" id="id-verify">
                            </form>
                            <form id="form-payment" class="d-none" method="post" action="/admin/paket-payment/delete">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id" id="id-payment">
                            </form>
                        </div>
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

<script src="<?php echo e(asset('templates/matrix-admin/assets/extra-libs/DataTables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/magnific-popup/meg.init.js')); ?>"></script>
<script type="text/javascript">
    // DataTable
    $('#table-paket').DataTable();
    $('#table-pembayaran-paket').DataTable();

    // Button Verify Payment
    $(document).on("click", ".btn-verify", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var ask = confirm("Anda yakin ingin memverifikasi pembayaran ini?");
        if(ask){
            $("#id-verify").val(id);
            $("#form-verify").submit();
        }
    });

    // Button Delete Paket
    $(document).on("click", ".btn-delete-paket", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var ask = confirm("Anda yakin ingin menghapus data ini?");
        if(ask){
            $("#id-paket").val(id);
            $("#form-paket").submit();
        }
    });

    // Button Delete Payment
    $(document).on("click", ".btn-delete-payment", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var ask = confirm("Anda yakin ingin menghapus data ini?");
        if(ask){
            $("#id-payment").val(id);
            $("#form-payment").submit();
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/magnific-popup/dist/magnific-popup.css')); ?>" rel="stylesheet">
<style type="text/css">
    .border-top, .border-bottom {padding: 1.25rem;}
    .form-control {border-color: #caccce;}
    .input-group-text {border-color: #caccce;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-referral/resources/views/paket/admin/index.blade.php ENDPATH**/ ?>