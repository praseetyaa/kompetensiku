<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Edit Admin</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Admin</h6>
    </div>
    <div class="card-body">
      <form method="post" action="/admin/update">
        <?php echo e(csrf_field()); ?>

        <div class="form-row">
          <div class="form-group col-6">
            <label>Nama:</label>
            <input name="nama" type="text" class="form-control <?php echo e($errors->has('nama') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Nama" value="<?php echo e($admin->nama_user); ?>">
            <?php if($errors->has('nama')): ?>
            <div class="invalid-feedback">
              <?php echo e(ucfirst($errors->first('nama'))); ?>

            </div>
            <?php endif; ?>
          </div>
          <div class="form-group col-6">
            <label>Email:</label>
            <input name="email" type="email" class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Email" value="<?php echo e($admin->email); ?>">
            <?php if($errors->has('email')): ?>
            <div class="invalid-feedback">
              <?php echo e(ucfirst($errors->first('email'))); ?>

            </div>
            <?php endif; ?>
          </div>
          <div class="form-group col-6">
            <label>Username:</label>
            <input name="username" type="text" class="form-control <?php echo e($errors->has('username') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Username" value="<?php echo e($admin->username); ?>">
            <?php if($errors->has('username')): ?>
            <div class="invalid-feedback">
              <?php echo e(ucfirst($errors->first('username'))); ?>

            </div>
            <?php endif; ?>
          </div>
          <div class="form-group col-6">
            <label>Password:</label>
            <div class="input-group">
              <input name="password" type="password" class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Password" value="<?php echo e(old('password')); ?>">
              <div class="input-group-append">
                <button class="btn <?php echo e($errors->has('password') ? 'btn-outline-danger' : 'btn-outline-primary'); ?> btn-toggle-password show" type="button"><i class="fa fa-eye"></i></button>
              </div>
            </div>
            <?php if($errors->has('password')): ?>
            <small class="text-danger"><?php echo e(ucfirst($errors->first('password'))); ?></small>
            <?php endif; ?>
            <small class="text-muted">Kosongi saja jika tidak ingin mengganti password.</small>
          </div>
        </div>
        <div class="form-group">
          <input type="hidden" name="id" value="<?php echo e($admin->id_user); ?>">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/admin/list" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<!-- JavaScripts -->
<script type="text/javascript">
  $(document).ready(function() {
    // Button toggle password
    $(document).on("click", ".btn-toggle-password", function(e){
      e.preventDefault();
      $(this).hasClass("show") ? $("input[name=password]").attr("type","text") : $("input[name=password]").attr("type","password");
      $(this).hasClass("show") ? $(this).find(".fa").removeClass("fa-eye").addClass("fa-eye-slash") : $(this).find(".fa").removeClass("fa-eye-slash").addClass("fa-eye");
      $(this).hasClass("show") ? $(this).removeClass("show").addClass("hide") : $(this).removeClass("hide").addClass("show");
    });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/admin/edit.blade.php ENDPATH**/ ?>