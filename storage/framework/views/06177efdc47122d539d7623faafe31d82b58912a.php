<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Posisi</h1>
  <p class="mb-4">Posisi pekerjaan yang ada dalam perusahaan.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Data Posisi</h6>
      <a class="btn btn-sm btn-primary" href="/admin/posisi/create">
        <i class="fas fa-plus fa-sm fa-fw text-gray-400"></i> Tambah Posisi
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width="50">No.</th>
              <th width="200">Posisi</th>
              <th>Tes</th>
              <th>Keahlian</th>
              <th width="80">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php $__currentLoopData = $posisi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($i); ?></td>
              <td><?php echo e($data->nama_posisi); ?></td>
              <td><?php echo e($data->tes); ?></td>
              <td><?php echo e($data->keahlian); ?></td>
              <td>
                <a href="/admin/posisi/edit/<?php echo e($data->id_posisi); ?>" class="btn btn-sm btn-info mr-2 mb-2" data-id="<?php echo e($data->id_posisi); ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                <a href="#" class="btn btn-sm btn-danger mr-2 mb-2 delete" data-id="<?php echo e($data->id_posisi); ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
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
          url: "/admin/posisi/delete",
          data: {_token: "<?php echo e(csrf_token()); ?>", id: id},
          success: function(response){
            if(response == "Berhasil menghapus data!"){
              alert(response);
              window.location.href = "/admin/posisi";
            }
          }
        })
      }
    });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/posisi/admin/index.blade.php ENDPATH**/ ?>