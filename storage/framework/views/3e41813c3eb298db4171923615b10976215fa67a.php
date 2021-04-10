<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Import dari Excel</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
<!--     <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Soal DISC Test</h6>
    </div> -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Import dari Excel</h6>
    </div>
    <div class="card-body">
      <form method="post" action="/admin/disc/import/post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
          <input type="file" name="file">
          <div>
            <?php if($errors->has('file')): ?>
              <small class="text-danger"><?php echo e(ucfirst($errors->first('file'))); ?></small>
            <?php else: ?>
              <small>Hanya bisa mengimport dengan file format .xls dan .xlsx</small>
            <?php endif; ?>
          </div>
        </div>
        <input type="hidden" name="id_paket" value="<?php echo e($id_paket); ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/disc/admin/import.blade.php ENDPATH**/ ?>