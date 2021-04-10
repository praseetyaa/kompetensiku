<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tambah Posisi</h1>
  <p class="mb-4">Posisi pekerjaan yang ada dalam perusahaan.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Posisi</h6>
    </div>
    <div class="card-body">
      <form method="post" action="/admin/posisi/store">
        <?php echo e(csrf_field()); ?>

        <div class="form-row">
          <div class="col-md-6">
            <div class="row">
              <div class="form-group col-md-12">
                <label>Nama Posisi:</label>
                <input name="nama_posisi" class="form-control <?php echo e($errors->has('nama_posisi') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Nama Posisi" value="<?php echo e(old('nama_posisi')); ?>">
                <?php if($errors->has('nama_posisi')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('nama_posisi'))); ?>

                </div>
                <?php endif; ?>
              </div>
              <div class="form-group col-md-12">
                <label>Tes:</label>
                <div class="row">
                  <?php $__currentLoopData = $tes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-md-6 col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="tes[]" value="<?php echo e($data->id_tes); ?>" id="defaultCheck-<?php echo e($key); ?>">
                      <label class="form-check-label" for="defaultCheck-<?php echo e($key); ?>">
                        <?php echo e($data->nama_tes); ?>

                      </label>
                    </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="form-group col-md-12">
                <label>Keahlian:</label>
                <div class="row">
                  <div class="col-12 mb-2 input-keahlian" data-id="1">
                    <div class="input-group">
                      <input name="keahlian[]" type="text" class="form-control" placeholder="Masukkan Keahlian">
                      <div class="input-group-append">
                        <button class="btn btn-outline-success btn-add" type="button" data-id="1" title="Tambah"><i class="fa fa-plus"></i></button>
                        <button class="btn btn-outline-danger btn-delete" type="button" data-id="1" title="Hapus"><i class="fa fa-trash"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/admin/posisi" class="btn btn-secondary">Kembali</a>
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

    // Button Add
    $(document).on("click", ".btn-add", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var input = $(".input-keahlian");
      var html = '';
      html += '<div class="col-12 mb-2 input-keahlian" data-id="' + (input.length+1) + '">';
      html += '<div class="input-group">';
      html += '<input name="keahlian[]" type="text" class="form-control" placeholder="Masukkan Keahlian">';
      html += '<div class="input-group-append">';
      html += '<button class="btn btn-outline-success btn-add" type="button" data-id="' + (input.length+1) + '" title="Tambah"><i class="fa fa-plus"></i></button>';
      html += '<button class="btn btn-outline-danger btn-delete" type="button" data-id="' + (input.length+1) + '" title="Hapus"><i class="fa fa-trash"></i></button>';
      html += '</div>';
      html += '</div>';
      html += '</div>';
      $(".input-keahlian[data-id=" + input.length + "]").after(html);
    });

    // Button Delete
    $(document).on("click", ".btn-delete", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var input = $(".input-keahlian");
      if(input.length <= 1){
        $(".input-keahlian[data-id=" + id + "]").find("input[type=text]").val("");
      }
      else{
        $(".input-keahlian[data-id=" + id + "]").remove();
        var inputAfter = $(".input-keahlian");
        inputAfter.each(function(key,elem){
          $(elem).attr("data-id", (key+1));
          $(elem).find(".btn-add").attr("data-id", (key+1));
          $(elem).find(".btn-delete").attr("data-id", (key+1));
        });
      }
    });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/posisi/admin/create.blade.php ENDPATH**/ ?>