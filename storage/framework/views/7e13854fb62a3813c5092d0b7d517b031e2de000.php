<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Edit Pelamar</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Pelamar</h6>
    </div>
    <div class="card-body">
      <form method="post" action="/admin/pelamar/update">
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
                <td>
                  <input type="text" name="nama_lengkap" class="form-control <?php echo e($errors->has('nama_lengkap') ? 'is-invalid' : ''); ?>" value="<?php echo e($pelamar->nama_lengkap); ?>">
                  <?php if($errors->has('nama_lengkap')): ?>
                  <small class="text-danger">
                    <?php echo e(ucfirst($errors->first('nama_lengkap'))); ?>

                  </small>
                  <?php endif; ?>
                </td>
              </tr>
              <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td>
                  <div class="d-md-flex">
                    <input type="text" name="tempat_lahir" class="form-control <?php echo e($errors->has('tempat_lahir') ? 'is-invalid' : ''); ?> col-md" value="<?php echo e($pelamar->tempat_lahir); ?>">
                    <input type="text" name="tanggal_lahir" class="form-control <?php echo e($errors->has('tanggal_lahir') ? 'is-invalid' : ''); ?> col-md ml-md-2 mt-2 mt-md-0" value="<?php echo e($pelamar->tanggal_lahir); ?>">
                  </div>
                </td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                  <select name="jenis_kelamin" class="form-control custom-select col-lg-4">
                    <option value="" disabled>--Pilih--</option>
                    <option value="L" <?php echo e($pelamar->jenis_kelamin == 'L' ? 'selected' : ''); ?>>Laki-Laki</option>
                    <option value="P" <?php echo e($pelamar->jenis_kelamin == 'P' ? 'selected' : ''); ?>>Perempuan</option>
                  </select>
                  <?php if($errors->has('jenis_kelamin')): ?>
                  <small class="text-danger">
                    <?php echo e(ucfirst($errors->first('jenis_kelamin'))); ?>

                  </small>
                  <?php endif; ?>
                </td>
              </tr>
              <tr>
                <td>Agama</td>
                <td>:</td>
                <td>
                  <select name="agama" class="form-control custom-select col-lg-4">
                    <option value="" disabled>--Pilih--</option>
                    <?php $__currentLoopData = $agama; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id_agama); ?>" <?php echo e($pelamar->agama == $data->id_agama ? 'selected' : ''); ?>><?php echo e($data->agama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php if($errors->has('agama')): ?>
                  <small class="text-danger">
                    <?php echo e(ucfirst($errors->first('agama'))); ?>

                  </small>
                  <?php endif; ?>
                </td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                  <input type="email" name="email" class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" value="<?php echo e($pelamar->email); ?>">
                  <?php if($errors->has('email')): ?>
                  <small class="text-danger">
                    <?php echo e(ucfirst($errors->first('email'))); ?>

                  </small>
                  <?php endif; ?>
                </td>
              </tr>
              <tr>
                <td>Nomor HP</td>
                <td>:</td>
                <td>
                  <input type="text" name="nomor_hp" class="form-control" value="<?php echo e($pelamar->nomor_hp); ?>">
                  <?php if($errors->has('nomor_hp')): ?>
                  <small class="text-danger">
                    <?php echo e(ucfirst($errors->first('nomor_hp'))); ?>

                  </small>
                  <?php endif; ?>
                </td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                  <textarea name="alamat" class="form-control" rows="3"><?php echo e($pelamar->alamat); ?></textarea>
                  <?php if($errors->has('alamat')): ?>
                  <small class="text-danger">
                    <?php echo e(ucfirst($errors->first('alamat'))); ?>

                  </small>
                  <?php endif; ?>
                </td>
              </tr>
              <tr>
                <td>Pendidikan Terakhir</td>
                <td>:</td>
                <td>
                  <textarea name="pendidikan_terakhir" class="form-control" rows="3"><?php echo e($pelamar->pendidikan_terakhir); ?></textarea>
                  <?php if($errors->has('pendidikan_terakhir')): ?>
                  <small class="text-danger">
                    <?php echo e(ucfirst($errors->first('pendidikan_terakhir'))); ?>

                  </small>
                  <?php endif; ?>
                </td>
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
                      <td><input type="text" name="akun_sosmed[<?php echo e($sosmed); ?>]" class="form-control" value="<?php echo e($akun); ?>"></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </table>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div class="form-group mt-3">
          <input type="hidden" name="id" value="<?php echo e($pelamar->id_pelamar); ?>">
          <input type="hidden" name="id_user" value="<?php echo e($pelamar->id_user); ?>">
          <button type="submit" class="btn btn-success">Simpan</button>
          <a href="/admin/pelamar" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(function(){
    $('input[name=tanggal_lahir]').datepicker({
      format: 'yyyy-mm-dd',
    });

    $(document).on("click", ".btn-show-datepicker", function(e){
      e.preventDefault();
      $('input[name=tanggal_lahir]').focus();
    })
  });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" />
<style type="text/css">
  .table {min-width: 600px;}
  .table tr td {padding: .5rem;}
  .table tr td:first-child {font-weight: bold; min-width: 200px; width: 200px}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/pelamar/admin/edit.blade.php ENDPATH**/ ?>