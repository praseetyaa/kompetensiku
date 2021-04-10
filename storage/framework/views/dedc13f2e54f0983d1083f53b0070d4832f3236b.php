<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Keterangan</h1>
  <p class="mb-4">Keterangan yang dihasilkan dari mengerjakan tes.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Keterangan</h6>
      <?php if(isset($keterangan)): ?>
      <a class="btn btn-sm btn-danger delete" href="#" data-id="<?php echo e(isset($keterangan) ? $keterangan->id_keterangan : ''); ?>">
        <i class="fas fa-trash fa-sm fa-fw text-gray-400"></i> Hapus Keterangan
      </a>
      <?php endif; ?>
    </div>
    <div class="card-body">
      <form method="post" action="/admin/tes/tipe/<?php echo e($id_tes); ?>/paket/keterangan/save">
        <?php echo e(csrf_field()); ?>

        <?php if(Session::get('message') != null): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(Session::get('message')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Keterangan D</label>
              <textarea name="d" class="form-control" placeholder="Tuliskan sesuatu..."><?php echo isset($keterangan) ? $keterangan->d : old('d'); ?></textarea>
              <?php if($errors->has('d')): ?>
              <small class="text-danger" id="error-d">Keterangan <?php echo e(ucfirst($errors->first('d'))); ?></small>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Keterangan I</label>
              <textarea name="i" class="form-control" placeholder="Tuliskan sesuatu..."><?php echo isset($keterangan) ? $keterangan->i : old('i'); ?></textarea>
              <?php if($errors->has('i')): ?>
              <small class="text-danger" id="error-i">Keterangan <?php echo e(ucfirst($errors->first('i'))); ?></small>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Keterangan S</label>
              <textarea name="s" class="form-control" placeholder="Tuliskan sesuatu..."><?php echo isset($keterangan) ? $keterangan->s : old('s'); ?></textarea>
              <?php if($errors->has('s')): ?>
              <small class="text-danger" id="error-s">Keterangan <?php echo e(ucfirst($errors->first('s'))); ?></small>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Keterangan C</label>
              <textarea name="c" class="form-control" placeholder="Tuliskan sesuatu..."><?php echo isset($keterangan) ? $keterangan->c : old('c'); ?></textarea>
              <?php if($errors->has('c')): ?>
              <small class="text-danger" id="error-c">Keterangan <?php echo e(ucfirst($errors->first('c'))); ?></small>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <input type="hidden" name="id_tes" value="<?php echo e(isset($keterangan) ? $keterangan->id_tes : $id_tes); ?>">
        <input type="hidden" name="id_paket" value="<?php echo e(isset($keterangan) ? $keterangan->id_paket : $id_paket); ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/admin/tes/tipe/<?php echo e($id_tes); ?>" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<!-- Custom styles for this page -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.18.0/ui/trumbowyg.min.css">

<!-- CSS -->
<style type="text/css">
  .trumbowyg-box {margin-top: 0; margin-bottom: 0;}
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

    // Delete
    $(document).on("click", ".delete", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var ask = confirm("Anda yakin ingin menghapus data ini?");
      if(ask){
        $.ajax({
          type: "post",
          url: "/admin/tes/tipe/<?php echo e($id_tes); ?>/paket/keterangan/delete",
          data: {_token: "<?php echo e(csrf_token()); ?>", id: id},
          success: function(response){
            if(response == "Berhasil menghapus data!"){
              alert(response);
              window.location.href = "/admin/tes/tipe/<?php echo e($id_tes); ?>/paket/keterangan/<?php echo e($id_paket); ?>";
            }
          }
        })
      }
    });
  })
</script>

<?php if($errors->has('d')): ?>
<script type="text/javascript">
  $(function(){
    $('#error-d').siblings('.trumbowyg-box').addClass('border-danger');
  })
</script>
<?php endif; ?>

<?php if($errors->has('i')): ?>
<script type="text/javascript">
  $(function(){
    $('#error-i').siblings('.trumbowyg-box').addClass('border-danger');
  })
</script>
<?php endif; ?>

<?php if($errors->has('s')): ?>
<script type="text/javascript">
  $(function(){
    $('#error-s').siblings('.trumbowyg-box').addClass('border-danger');
  })
</script>
<?php endif; ?>

<?php if($errors->has('c')): ?>
<script type="text/javascript">
  $(function(){
    $('#error-c').siblings('.trumbowyg-box').addClass('border-danger');
  })
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/keterangan/admin/index.blade.php ENDPATH**/ ?>