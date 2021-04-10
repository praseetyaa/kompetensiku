

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
                <h4 class="page-title">Data Pelatihan</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/pelatihan">Pelatihan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Pelatihan</li>
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
                                <h5 class="mb-0">Data Pelatihan</h5>
                            </div>
                            <?php if(Auth::user()->id_user == 1 || Auth::user()->id_user == 2 || Auth::user()->id_user == 3): ?>
                            <div class="col-12 col-sm-auto text-center text-sm-left">
                                <a href="/admin/pelatihan/create" class="btn btn-sm btn-primary"><i class="fa fa-plus mr-2"></i> Tambah Pelatihan</a>
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
                            <table id="table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="40">No.</th>
                                        <th>Pelatihan</th>
                                        <th width="150">Trainer</th>
                                        <th width="100">Peserta</th>
                                        <th width="150">Waktu</th>
                                        <th width="40">Edit</th>
                                        <th width="40">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $pelatihan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                        <td>
											<a href="/admin/pelatihan/detail/<?php echo e($data->id_pelatihan); ?>"><?php echo e($data->nama_pelatihan); ?></a>
											<br>
											<small><?php echo e($data->nomor_pelatihan); ?></small>
										</td>
                                        <td><a href="/admin/user/detail/<?php echo e($data->id_user); ?>"><?php echo e($data->nama_user); ?></a></td>
										<td><a href="/admin/pelatihan/peserta/<?php echo e($data->id_pelatihan); ?>" title="Lihat Daftar Peserta"><?php echo e(number_format($data->jumlah_peserta,0,'.','.')); ?> orang</a>
                                        <td>
											<?php echo e(generate_date_range('join', $data->tanggal_pelatihan_from.' - '.$data->tanggal_pelatihan_to)['from']); ?>

											<br>
											s.d.
											<br>
											<?php echo e(generate_date_range('join', $data->tanggal_pelatihan_from.' - '.$data->tanggal_pelatihan_to)['to']); ?>

										</td>
                                        <td><a href="/admin/pelatihan/edit/<?php echo e($data->id_pelatihan); ?>" class="btn btn-warning btn-sm btn-block" title="Edit"><i class="fa fa-edit"></i></a></td>
                                        <td><a href="#" class="btn btn-danger btn-sm btn-block btn-delete" data-id="<?php echo e($data->id_pelatihan); ?>" title="Hapus"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <form id="form" class="d-none" method="post" action="/admin/pelatihan/delete">
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script src="<?php echo e(asset('templates/matrix-admin/assets/extra-libs/DataTables/datatables.min.js')); ?>"></script>
<script type="text/javascript">
    // DataTable
    $('#table').DataTable();

    // Button Delete
    $(document).on("click", ".btn-delete", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var ask = confirm("Anda yakin ingin menghapus data ini?");
        if(ask){
            $("#id").val(id);
            $("#form").submit();
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/public_html/laravel-v3/resources/views/pelatihan/admin/index.blade.php ENDPATH**/ ?>