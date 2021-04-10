<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Import Soal dari Excel</h1>
  <p class="mb-4">Soal tes <?php echo e($tes->nama_tes); ?> yang digunakan untuk mengetes calon karyawan.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Import dari Excel</h6>
    </div>
    <div class="card-body">
      <form method="post" action="/admin/tes/tipe/<?php echo e($tes->id_tes); ?>/soal/import/post" enctype="multipart/form-data">
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
        <input type="hidden" name="id_tes" value="<?php echo e($tes->id_tes); ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/soal/admin/import.blade.php ENDPATH**/ ?>