

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
                <h4 class="page-title">Pelatihan</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/member">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pelatihan</li>
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
			<?php if(Auth::user()->role == 6): ?>
            <!-- column -->
            <div class="col-lg-12">
                <!-- card -->
                <div class="card shadow">
                    <div class="card-title border-bottom">
                        <div class="row">
                            <div class="col-12 col-sm py-1 mb-2 mb-sm-0 text-center text-sm-left">
                                <h5 class="mb-0">Data Pelatihan</h5>
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
                                        <th>Pelatihan</th>
                                        <th width="150">Tanggal</th>
                                        <th width="100">Peserta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $pelatihan_sendiri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                        <td>
											<a href="/member/pelatihan/detail/<?php echo e($data->id_pelatihan); ?>"><?php echo e($data->nama_pelatihan); ?></a>
											<br>
											<small><?php echo e($data->nomor_pelatihan); ?></small>
										</td>
                                        <td>
											<?php echo e(generate_date_range('join', $data->tanggal_pelatihan_from.' - '.$data->tanggal_pelatihan_to)['from']); ?>

											<br>
											s.d.
											<br>
											<?php echo e(generate_date_range('join', $data->tanggal_pelatihan_from.' - '.$data->tanggal_pelatihan_to)['to']); ?>

										</td>
										<td><a href="/member/pelatihan/peserta/<?php echo e($data->id_pelatihan); ?>" title="Lihat Daftar Peserta"><?php echo e(number_format($data->jumlah_peserta,0,'.','.')); ?> orang</a></td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- column -->
			<?php endif; ?>
            <!-- column -->
            <div class="col-lg-12">
                <!-- card -->
                <div class="card shadow">
                    <div class="card-title border-bottom">
                        <div class="row">
                            <div class="col-12 col-sm py-1 mb-2 mb-sm-0 text-center text-sm-left">
                                <h5 class="mb-0">Pelatihan Yang Akan Datang</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
						<div class="col-12">
							<div class="row">
								<?php if(count($pelatihan)>0): ?>
									<?php $__currentLoopData = $pelatihan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<a class="col-md-6 col-lg-3 col-xlg-3" href="/member/pelatihan/detail/<?php echo e($data->id_pelatihan); ?>">
										<div class="card card-hover shadow">
											<div class="box text-center">
												<div class="row text-secondary">
													<div class="col-sm-6 text-center text-sm-left"><i class="fa fa-calendar mr-2"></i><?php echo e(explode(' ', generate_date_range('join', $data->tanggal_pelatihan_from.' - '.$data->tanggal_pelatihan_to)['from'])[0]); ?></div>
													<div class="col-sm-6 text-center text-sm-right"><i class="fa fa-clock mr-2"></i><?php echo e(explode(' ', generate_date_range('join', $data->tanggal_pelatihan_from.' - '.$data->tanggal_pelatihan_to)['from'])[1]); ?> WIB</div>
												</div>
											    <img src="<?php echo e(asset('assets/images/default/pelatihan.png')); ?>" height="100">
												<h6 class="text-dark mt-2 mb-1"><?php echo e($data->nama_pelatihan); ?></h4>
												<div class="text-center text-secondary"><?php echo e($data->nama_user); ?></div>
											</div>
										</div>
									</a>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php else: ?>
								<div class="col-12">
									<div class="alert alert-danger text-center">Belum ada pelatihan yang bisa diikuti.</div>
								</div>
								<?php endif; ?>
							</div>
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
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" rel="stylesheet">
<style type="text/css">
    .border-top, .border-bottom {padding: 1.25rem;}
    .form-control {border-color: #caccce;}
    .input-group-text {border-color: #caccce;}
	.box {background-color: #ffffff!important; cursor: pointer;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/member/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/public_html/laravel-v3/resources/views/pelatihan/member/index.blade.php ENDPATH**/ ?>