<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tambah Lowongan</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Lowongan</h6>
    </div>
    <div class="card-body">
      <form method="post" action="/admin/lowongan/store">
        <?php echo e(csrf_field()); ?>

        <div class="form-row">
          <div class="form-group col-md-8">
            <label>Judul:</label>
            <input type="text" name="judul" class="form-control <?php echo e($errors->has('judul') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Judul" value="<?php echo e(old('judul')); ?>">
            <?php if($errors->has('judul')): ?>
            <div class="invalid-feedback">
              <?php echo e(ucfirst($errors->first('judul'))); ?>

            </div>
            <?php endif; ?>
          </div>
          <div class="form-group col-md-4">
            <label>Posisi:</label>
            <input type="text" name="posisi" class="form-control <?php echo e($errors->has('posisi') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Posisi" value="<?php echo e(old('posisi')); ?>">
            <?php if($errors->has('posisi')): ?>
            <div class="invalid-feedback">
              <?php echo e(ucfirst($errors->first('posisi'))); ?>

            </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="form-group">
          <label>Deskripsi:</label>
          <textarea name="deskripsi_lowongan" class="form-control" placeholder="Tuliskan sesuatu..."></textarea>
          <?php if($errors->has('deskripsi_lowongan')): ?>
          <small class="text-danger"><?php echo e(ucfirst($errors->first('deskripsi_lowongan'))); ?></small>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label>Status:</label>
          <div class="row">
            <div class="col">
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value="1" checked>
                <label class="custom-control-label" for="customRadioInline1">Aktif</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value="0">
                <label class="custom-control-label" for="customRadioInline2">Tidak Aktif</label>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/admin/lowongan" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<!-- Custom styles for this page -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.18.0/ui/trumbowyg.min.css">

<!-- CSS -->
<style type="text/css">
  .trumbowyg-box {margin-top: 0;}
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<!-- Page level plugins -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.18.0/trumbowyg.min.js"></script>

<!-- JavaScripts -->
<script type="text/javascript">
  $(function(){
    // Trumbowyg
    $('textarea').trumbowyg();
  })
</script>

<?php if($errors->has('deskripsi_lowongan')): ?>
<script type="text/javascript">
  $(function(){
    $('.trumbowyg-box').addClass('border-danger');
  })
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/lowongan/admin/create.blade.php ENDPATH**/ ?>