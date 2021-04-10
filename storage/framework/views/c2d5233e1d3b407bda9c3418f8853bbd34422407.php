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
                <h4 class="page-title">Peserta Pelatihan</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/pelatihan">Pelatihan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Peserta Pelatihan</li>
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
                                <h5 class="mb-0">Peserta Pelatihan: <?php echo e($pelatihan->nama_pelatihan); ?></h5>
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
                            <table id="table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="40">No.</th>
                                        <th>Nama</th>
                                        <th width="150">Kode Sertifikat</th>
                                        <th width="100">Status</th>
                                        <th width="150">Tanggal Mendaftar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $pelatihan_member; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                        <td><a href="/admin/user/detail/<?php echo e($data->id_user); ?>"><?php echo e($data->nama_user); ?></a></td>
										<td><?php echo e($data->kode_sertifikat); ?></td>
										<td><?php echo e($data->status_pelatihan == 1 ? 'Lulus' : 'Belum Lulus'); ?></td>
										<!--
										<td>
											<select class="form-control form-control-sm select-status" data-id="<?php echo e($data->id_pm); ?>">
												<option value="1" <?php echo e($data->status_pelatihan == 1 ? 'selected' : ''); ?>>Lulus</option>
												<option value="0" <?php echo e($data->status_pelatihan == 0 ? 'selected' : ''); ?>>Belum Lulus</option>
											</select>
										</td>
										-->
                                        <td><?php echo e(date('Y-m-d H:i:s', strtotime($data->pm_at))); ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
						<form id="form" class="d-none" method="post" action="/admin/pelatihan/update-status">
							<?php echo e(csrf_field()); ?>

							<input type="hidden" name="id" id="id">
							<input type="hidden" name="status" id="status">
						</form>
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
    <?php echo $__env->make('template/member/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
	
    // Change Status
    $(document).on("change", ".select-status", function(e){
        e.preventDefault();
        var id = $(this).data("id");
		$("#id").val(id);
		$("#status").val($(this).val());
		$("#form").submit();
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/pelatihan/admin/participant.blade.php ENDPATH**/ ?>