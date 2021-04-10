<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Edit Posisi</h1>
  <p class="mb-4">Posisi pekerjaan yang ada dalam perusahaan.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Posisi</h6>
    </div>
    <div class="card-body">
      <form method="post" action="/hrd/posisi/update">
        <?php echo e(csrf_field()); ?>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Nama Posisi:</label>
            <input name="nama_posisi" class="form-control <?php echo e($errors->has('nama_posisi') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Nama Posisi" value="<?php echo e($posisi->nama_posisi); ?>">
            <?php if($errors->has('nama_posisi')): ?>
            <div class="invalid-feedback">
              <?php echo e(ucfirst($errors->first('nama_posisi'))); ?>

            </div>
            <?php endif; ?>
          </div>
          <div class="form-group col-md-6">
            <label>Tes:</label>
            <div class="row">
              <?php $__currentLoopData = $tes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-6 col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="tes[]" value="<?php echo e($data->id_tes); ?>" id="defaultCheck-<?php echo e($key); ?>" <?php echo e(in_array($data->id_tes, $posisi->tes) ? 'checked' : ''); ?>>
                  <label class="form-check-label" for="defaultCheck-<?php echo e($key); ?>">
                    <?php echo e($data->nama_tes); ?>

                  </label>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <input type="hidden" name="id" value="<?php echo e($posisi->id_posisi); ?>">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/hrd/posisi" class="btn btn-secondary">Kembali</a>
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
<?php echo $__env->make('template/hrd/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/posisi/hrd/edit.blade.php ENDPATH**/ ?>