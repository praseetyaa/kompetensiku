<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tutorial</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Tutorial</h6>
      <?php if(isset($tutorial)): ?>
      <a class="btn btn-sm btn-danger delete" href="#" data-id="<?php echo e(isset($tutorial) ? $tutorial->id_tutorial : ''); ?>">
        <i class="fas fa-trash fa-sm fa-fw text-gray-400"></i> Hapus Tutorial
      </a>
      <?php endif; ?>
    </div>
    <div class="card-body">
      <form method="post" action="/admin/disc/paket/tutorial/save">
        <?php echo e(csrf_field()); ?>

        <?php if(Session::get('message') != null): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(Session::get('message')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <div class="form-group">
          <textarea name="tutorial" class="form-control" placeholder="Tuliskan sesuatu..."><?php echo isset($tutorial) ? $tutorial->tutorial : old('tutorial'); ?></textarea>
          <?php if($errors->has('tutorial')): ?>
          <small class="text-danger"><?php echo e(ucfirst($errors->first('tutorial'))); ?></small>
          <?php endif; ?>
        </div>
        <input type="hidden" name="id_paket" value="<?php echo e(isset($tutorial) ? $tutorial->id_paket : $id); ?>">
        <input type="hidden" name="nama" value="<?php echo e(isset($tutorial) ? $tutorial->nama : 'disc'); ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/admin/disc" class="btn btn-secondary">Kembali</a>
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

    // Delete
    $(document).on("click", ".delete", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var ask = confirm("Anda yakin ingin menghapus data ini?");
      if(ask){
        $.ajax({
          type: "post",
          url: "/admin/disc/paket/tutorial/delete",
          data: {_token: "<?php echo e(csrf_token()); ?>", id: id},
          success: function(response){
            if(response == "Berhasil menghapus data!"){
              alert(response);
              window.location.href = "/admin/disc/paket/tutorial/<?php echo e($id); ?>";
            }
          }
        })
      }
    });
  })
</script>

<?php if($errors->has('tutorial')): ?>
<script type="text/javascript">
  $(function(){
    $('.trumbowyg-box').addClass('border-danger');
  })
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/disc/admin/tutorial.blade.php ENDPATH**/ ?>