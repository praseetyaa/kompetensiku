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
                <h4 class="page-title">Data Produk</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/produk">Produk</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Produk</li>
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
                    <div class="card-title border-bottom">
                        <div class="row">
                            <div class="col-12 col-sm py-1 mb-2 mb-sm-0 text-center text-sm-left">
                                <h5 class="mb-0">Data Produk</h5>
                            </div>
                            <div class="col-12 col-sm-auto text-center text-sm-left">
                                <a href="/admin/produk/upload" class="btn btn-sm btn-primary"><i class="fa fa-upload mr-2"></i> Upload Produk</a>
                            </div>
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
                            <table id="table-produk" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="30">No.</th>
                                        <th>Nama Produk</th>
                                        <th width="50">Ukuran</th>
                                        <th width="80">Tanggal</th>
                                        <th width="40">Download</th>
                                        <th width="40">Edit</th>
                                        <th width="40">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-id="<?php echo e($file->id_file); ?>">
                                        <td><?php echo e($i); ?></td>
                                        <td class="td-name" data-id="<?php echo e($file->id_file); ?>" data-value="<?php echo e($file->nama_file); ?>">
                                            <i class="far fa-<?php echo e(mime2ext($file->tipe_file)[1]); ?> mr-1" style="font-size: 20px;"></i> <?php echo e($file->nama_file); ?>

                                        </td>
                                        <td align="right"><?php echo e(generate_size($file->ukuran_file)); ?></td>
                                        <td><?php echo e(date('Y-m-d', strtotime($file->uploaded_at))); ?></td>
                                        <td><a href="<?php echo e(asset('assets/uploads/'.$file->url)); ?>" class="btn btn-info btn-sm btn-block" target="_blank" title="Download"><i class="fa fa-download"></i></a></td>
                                        <td><a href="#" class="btn btn-warning btn-sm btn-block btn-edit" data-id="<?php echo e($file->id_file); ?>" data-toggle="modal" data-target="#modal" title="Edit"><i class="fa fa-edit"></i></a></td>
                                        <td><a href="#" class="btn btn-danger btn-sm btn-block btn-delete" data-id="<?php echo e($file->id_file); ?>" title="Hapus"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <form id="form-delete" class="d-none" method="post" action="/admin/produk/delete">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id" id="id">
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

<!-- Modal Edit File -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit" method="post" action="/admin/produk/update">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="nama_produk" class="form-control <?php echo e($errors->has('nama_produk') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Nama Produk">
                            <?php if($errors->has('nama_produk')): ?>
                            <small class="text-danger"><?php echo e(ucfirst($errors->first('nama_produk'))); ?></small>
                            <?php endif; ?>
                        </div>
                        <input type="hidden" name="id_produk">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-submit-edit">Simpan</button>
                <button type="button" class="btn btn-danger"data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit File -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script src="<?php echo e(asset('templates/matrix-admin/assets/extra-libs/DataTables/datatables.min.js')); ?>"></script>
<script type="text/javascript">
    // DataTable
    $('#table-produk').DataTable();

    // Button Edit
    $(document).on("click", ".btn-edit", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var name = $("#table-produk tr").find(".td-name[data-id="+id+"]").data("value");
        $("#modal").find("input[name=id_produk]").val(id);
        $("#modal").find("input[name=nama_produk]").val(name);
    });

    // Close Modal
    $('#modal').on('hidden.bs.modal', function(e){
        $("#modal").find("input[name=id_produk]").val(null);
        $("#modal").find("input[name=nama_produk]").val(null);
    });

    // Button Submit Edit
    $(document).on("click", "#btn-submit-edit", function(e){
        $("#form-edit").submit();
    })

    // Button Delete
    $(document).on("click", ".btn-delete", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var ask = confirm("Anda yakin ingin menghapus data ini?");
        if(ask){
            $("#id").val(id);
            $("#form-delete").submit();
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" rel="stylesheet">
<style type="text/css">
    .border-top, .border-bottom {padding: 1.25rem;}
    .form-control {border-color: #caccce;}
    .input-group-text {border-color: #caccce;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\pra-kerja\resources\views/download/admin/index.blade.php ENDPATH**/ ?>