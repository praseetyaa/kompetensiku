<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data HRD</h1>
  <p class="mb-4">Human Resource Department.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Data HRD</h6>
      <a class="btn btn-sm btn-primary" href="/admin/hrd/create">
        <i class="fas fa-plus fa-sm fa-fw text-gray-400"></i> Tambah HRD
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width="50">No.</th>
              <th>Nama</th>
              <th width="150">Username</th>
              <th width="150">Email</th>
              <th width="80">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php $__currentLoopData = $hrd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($i); ?></td>
              <td><a href="/admin/hrd/profile/<?php echo e($data->id_user); ?>"><?php echo e($data->nama_user); ?></a></td>
              <td><?php echo e($data->username); ?></td>
              <td><?php echo e($data->email); ?></td>
              <td>
                <a href="/admin/hrd/edit/<?php echo e($data->id_user); ?>" class="btn btn-sm btn-info mr-2 mb-2" data-id="<?php echo e($data->id_user); ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                <?php if($data->id_user == Auth::user()->id_user): ?>
                <a href="#" class="btn btn-sm btn-dark mb-2 not-allowed" data-id="<?php echo e($data->id_user); ?>" data-toggle="tooltip" data-placement="top" title="Tidak bisa menghapus akun sendiri" style="cursor: not-allowed;"><i class="fa fa-trash"></i></a>
                <?php else: ?>
                <a href="#" class="btn btn-sm btn-danger mb-2 delete" data-id="<?php echo e($data->id_user); ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
                <?php endif; ?>
              </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<!-- Custom styles for this page -->
<link href="<?php echo e(asset('templates/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">

<!-- CSS -->
<style type="text/css">
  td a.btn {width: 36px;}
</style>

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

    // Button Not Allowed
    $(document).on("click", ".not-allowed", function(e){
      e.preventDefault();
    });

    // Delete
    $(document).on("click", ".delete", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var ask = confirm("Anda yakin ingin menghapus data ini?");
      if(ask){
        $.ajax({
          type: "post",
          url: "/admin/hrd/delete",
          data: {_token: "<?php echo e(csrf_token()); ?>", id: id},
          success: function(response){
            if(response == "Berhasil menghapus data!"){
              alert(response);
              window.location.href = "/admin/hrd";
            }
          }
        })
      }
    });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/hrd/admin/index.blade.php ENDPATH**/ ?>