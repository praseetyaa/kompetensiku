<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Paket Soal DISC Test</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Paket Soal DISC Test</h6>
      <a class="btn btn-sm btn-primary" href="/admin/disc/paket/create">
        <i class="fas fa-plus fa-sm fa-fw text-gray-400"></i> Tambah Paket Soal
      </a>
    </div>
    <div class="card-body">
      <?php if(count($paket_aktif)<1): ?>
      <div class="row">
        <div class="col">
          <div class="alert alert-danger">Belum ada paket soal yang <strong>aktif</strong>. Segera aktifkan salah satu paket soal!</div>
        </div>
      </div>
      <?php endif; ?>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width="50">No.</th>
              <th>Paket Soal</th>
              <th width="50">Jumlah</th>
              <th width="100">Status</th>
              <th width="170">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php $__currentLoopData = $paket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($i); ?></td>
              <td><a href="/admin/disc/paket/soal/<?php echo e($data->id_paket); ?>"><?php echo e($data->nama_paket); ?></a></td>
              <td><?php echo e($data->jumlah_soal); ?></td>
              <td>
                <select data-id="<?php echo e($data->id_paket); ?>" data-value="<?php echo e($data->status); ?>" class="form-control custom-select status">
                  <option value="1" <?php echo e($data->status == 1 ? 'selected' : ''); ?>>Aktif</option>
                  <option value="0" <?php echo e($data->status == 0 ? 'selected' : ''); ?>>Tidak Aktif</option>
                </select>
              </td>
              <td>
                <a href="/admin/disc/paket/tutorial/<?php echo e($data->id_paket); ?>" class="btn btn-sm btn-success mr-2 mb-2" data-id="<?php echo e($data->id_paket); ?>" data-toggle="tooltip" data-placement="top" title="Tutorial"><i class="fa fa-chalkboard-teacher"></i></a>
                <a href="/admin/disc/paket/keterangan/<?php echo e($data->id_paket); ?>" class="btn btn-sm btn-warning mr-2 mb-2" data-id="<?php echo e($data->id_paket); ?>" data-toggle="tooltip" data-placement="top" title="Keterangan"><i class="fa fa-info"></i></a>
                <a href="/admin/disc/paket/edit/<?php echo e($data->id_paket); ?>" class="btn btn-sm btn-info mr-2 mb-2" data-id="<?php echo e($data->id_paket); ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                <?php if($data->status == 1): ?>
                <a href="#" class="btn btn-sm btn-dark mb-2 not-allowed" data-id="<?php echo e($data->id_paket); ?>" data-toggle="tooltip" data-placement="top" title="Tidak bisa menghapus paket soal yang sedang Aktif" style="cursor: not-allowed;"><i class="fa fa-trash"></i></a>
                <?php else: ?>
                <a href="#" class="btn btn-sm btn-danger mb-2 delete" data-id="<?php echo e($data->id_paket); ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
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
          url: "/admin/disc/paket/delete",
          data: {_token: "<?php echo e(csrf_token()); ?>", id: id},
          success: function(response){
            if(response == "Berhasil menghapus data!"){
              alert(response);
              window.location.href = "/admin/disc";
            }
          }
        })
      }
    });

    // Change Status
    $(document).on("change", ".status", function(){
      var status_before = $(this).data("value");
      var id = $(this).data("id");
      var status = $(this).val();
      $(this).find("option[value="+status_before+"]").prop("selected",true);
      var word = status == 1 ? "mengaktifkan" : "menonaktifkan";
      var ask = confirm("Anda yakin ingin "+word+" data ini?");
      if(ask){
        $.ajax({
          type: "post",
          url: "/admin/disc/paket/update-status",
          data: {_token: "<?php echo e(csrf_token()); ?>", id: id, status: status},
          success: function(response){
            if(response == "Berhasil mengupdate status!"){
              alert(response);
              window.location.href = "/admin/disc";
            }
          }
        })
      }
    });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/disc/admin/index.blade.php ENDPATH**/ ?>