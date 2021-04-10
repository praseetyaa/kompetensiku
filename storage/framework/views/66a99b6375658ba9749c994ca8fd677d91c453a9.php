<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Profil</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
    </div>
    <div class="card-body">
      <form method="post" action="#">
        <?php echo e(csrf_field()); ?>

        <div class="form-row">
          <div class="col-auto p-3 border border-muted mb-2 mr-2">
            <img src="<?php echo e(asset('assets/images/pas-foto/'.$pelamar->pas_foto)); ?>" class="img-fluid" width="200">
          </div>
          <div class="col">
            <div class="row">
              <div class="col-sm-auto ml-sm-auto">
                <p class="font-weight-bold text-md-right">
                  <small>Melamar tanggal <?php echo e(setFullDate($pelamar->created_at)); ?>, pukul <?php echo e(date('H:i:s', strtotime($pelamar->created_at))); ?></small>
                  <br>
                  Untuk Jabatan: <?php echo e($pelamar->posisi); ?>

                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr>
                <td>Nama Lengkap</td>
                <td width="10">:</td>
                <td><?php echo e($pelamar->nama_lengkap); ?></td>
              </tr>
              <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td><?php echo e($pelamar->tempat_lahir); ?>, <?php echo e(date('d F Y', strtotime($pelamar->tanggal_lahir))); ?></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?php echo e($pelamar->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan'); ?></td>
              </tr>
              <tr>
                <td>Agama</td>
                <td>:</td>
                <td><?php echo e($pelamar->agama); ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo e($pelamar->email); ?></td>
              </tr>
              <tr>
                <td>Nomor Telepon</td>
                <td>:</td>
                <td><?php echo e($pelamar->nomor_telepon); ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo e($pelamar->alamat); ?></td>
              </tr>
              <tr>
                <td>Akun Sosial Media</td>
                <td>:</td>
                <td>
                  <table class="table table-bordered mb-0">
                    <?php $__currentLoopData = $pelamar->akun_sosmed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sosmed=>$akun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td width="150"><?php echo e($sosmed); ?></td>
                      <td width="10">:</td>
                      <td><?php echo e($akun); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </table>
                </td>
              </tr>
              <tr>
                <td>Pas Foto</td>
                <td>:</td>
                <td><a class="btn btn-sm btn-primary" href="<?php echo e(asset('assets/images/pas-foto/'.$pelamar->pas_foto)); ?>" target="_blank"><i class="fa fa-camera mr-2"></i> Lihat Foto</a></td>
              </tr>
              <tr>
                <td>Foto Ijazah</td>
                <td>:</td>
                <td><a class="btn btn-sm btn-primary" href="<?php echo e(asset('assets/images/foto-ijazah/'.$pelamar->foto_ijazah)); ?>" target="_blank"><i class="fa fa-camera mr-2"></i> Lihat Foto</a></td>
              </tr>
            </table>
          </div>
        </div>
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
  .table {min-width: 600px;}
  .table tr td {padding: .5rem;}
  .table tr td:first-child {font-weight: bold; min-width: 200px; width: 200px;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/applicant/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/pelamar/applicant/profile-2.blade.php ENDPATH**/ ?>