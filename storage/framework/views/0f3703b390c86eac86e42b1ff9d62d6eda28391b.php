<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Edit Admin</h1>
  <p class="mb-4">Admin (Administator) yang bertugas mengelola sistem.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Admin</h6>
    </div>
    <div class="card-body">
      <form method="post" action="/admin/update" enctype="multipart/form-data">
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
          <div class="form-group col-6">
            <label>Foto:</label>
            <?php if($errors->has('file')): ?>
            <br>
            <small class="text-danger">
              Foto wajib diisi.
            </small>
            <?php endif; ?>
            <br>
            <button type="button" class="btn btn-sm <?php echo e($errors->has('file') ? 'btn-danger' : 'btn-success'); ?> btn-upload"><i class="fa fa-upload mr-2"></i> Upload Foto</button>
            <input name="file" id="file" type="file" accept="image/*" class="d-none">
            <input type="hidden" name="foto" value="<?php echo e($admin->foto); ?>">
            <br>
            <img class="preview-image img-thumbnail mt-4 <?php echo e($admin->foto == '' ? 'd-none' : ''); ?>" width="300" src="<?php echo e(asset('assets/images/foto-admin/'.$admin->foto)); ?>">
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

    // Button upload
    $(document).on("click", ".btn-upload", function(e){
      e.preventDefault();
      $("#file").trigger("click");
    });

    // Preview photo before upload
    $(document).on("change", "input[type=file]", function(){
      readURL(this);
    });
  });

  function readURL(input) {
    if(input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $(".preview-image").attr('src', e.target.result).removeClass("d-none");
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/admin/edit.blade.php ENDPATH**/ ?>