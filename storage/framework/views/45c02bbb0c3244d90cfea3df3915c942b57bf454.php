<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tambah Paket Soal DISC Test</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Paket Soal DISC Test</h6>
    </div>
    <div class="card-body">
      <form method="post" action="/admin/disc/paket/store">
        <?php echo e(csrf_field()); ?>

        <div class="form-row">
          <div class="form-group col-6">
            <label>Nama Paket Soal:</label>
            <input name="nama_paket" class="form-control <?php echo e($errors->has('nama_paket') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Nama Paket" value="<?php echo e(old('nama_paket')); ?>">
            <?php if($errors->has('nama_paket')): ?>
            <div class="invalid-feedback">
              <?php echo e(ucfirst($errors->first('nama_paket'))); ?>

            </div>
            <?php endif; ?>
          </div>
          <div class="form-group col-6">
            <label>Jumlah Soal:</label>
            <input name="jumlah_soal" class="form-control <?php echo e($errors->has('jumlah_soal') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Jumlah Soal" value="<?php echo e(old('jumlah_soal')); ?>">
            <?php if($errors->has('jumlah_soal')): ?>
            <div class="invalid-feedback">
              <?php echo e(ucfirst($errors->first('jumlah_soal'))); ?>

            </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/admin/disc" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<!-- Custom styles for this page -->
<link href="<?php echo e(asset('templates/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<!-- Page level plugins -->
<script src="<?php echo e(asset('templates/sb-admin-2/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

<!-- JavaScripts -->
<script type="text/javascript">
  $(document).ready(function() {
    // Call the dataTables jQuery plugin
    $('#dataTable').DataTable();

    // Tooltip
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/disc/admin/create-packet.blade.php ENDPATH**/ ?>