<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Edit Tes</h1>
  <p class="mb-4">Jenis tes apa saja yang digunakan untuk menyeleksi calon karyawan.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Edit</h6>
    </div>
    <div class="card-body">
      <form method="post" action="/hrd/tes/update">
        <?php echo e(csrf_field()); ?>

        <div class="form-row">
          <div class="form-group col-6">
            <label>Nama Tes:</label>
            <input name="nama_tes" class="form-control <?php echo e($errors->has('nama_tes') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Nama Tes" value="<?php echo e($tes->nama_tes); ?>">
            <?php if($errors->has('nama_tes')): ?>
            <div class="invalid-feedback">
              <?php echo e(ucfirst($errors->first('nama_tes'))); ?>

            </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="form-group">
          <input type="hidden" name="id_tes" value="<?php echo e($tes->id_tes); ?>">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/hrd/tes" class="btn btn-secondary">Kembali</a>
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
<?php echo $__env->make('template/hrd/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/tes/hrd/edit.blade.php ENDPATH**/ ?>