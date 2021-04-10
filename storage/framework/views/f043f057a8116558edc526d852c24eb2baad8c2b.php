<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tambah Agama</h1>
  <p class="mb-4">Agama atau suatu kepercayaan yang dimiliki oleh user.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Agama</h6>
    </div>
    <div class="card-body">
      <form method="post" action="/admin/agama/store">
        <?php echo e(csrf_field()); ?>

        <div class="form-row">
          <div class="form-group col-6">
            <label>Nama Agama:</label>
            <input name="nama_agama" class="form-control <?php echo e($errors->has('nama_agama') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Nama Agama" value="<?php echo e(old('nama_agama')); ?>">
            <?php if($errors->has('nama_agama')): ?>
            <div class="invalid-feedback">
              <?php echo e(ucfirst($errors->first('nama_agama'))); ?>

            </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/admin/agama" class="btn btn-secondary">Kembali</a>
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
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/agama/admin/create.blade.php ENDPATH**/ ?>