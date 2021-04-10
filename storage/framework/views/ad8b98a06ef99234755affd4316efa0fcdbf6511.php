<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Soal Tes <?php echo e($tes->nama_tes); ?></h1>
  <p class="mb-4">Soal tes <?php echo e($tes->nama_tes); ?> yang digunakan untuk mengetes calon karyawan.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Soal Tes <?php echo e($tes->nama_tes); ?></h6>
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle btn btn-sm btn-primary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="More Info">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i> Menu
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
          <div class="dropdown-header">Menu:</div>
          <a class="dropdown-item <?php echo e(count($soal) == $paket->jumlah_soal ? 'btn-full' : ''); ?>" href="/hrd/tes/tipe/<?php echo e($id_tes); ?>/soal/create/<?php echo e($id_paket); ?>">Tambah Soal</a>
          <a class="dropdown-item" href="/hrd/tes/tipe/<?php echo e($id_tes); ?>/soal/export/<?php echo e($id_paket); ?>">Export ke Excel</a>
          <a class="dropdown-item" href="/hrd/tes/tipe/<?php echo e($id_tes); ?>/soal/import/<?php echo e($id_paket); ?>">Import dari Excel</a>
          <a class="dropdown-item" href="/hrd/tes/tipe/<?php echo e($id_tes); ?>/paket/tutorial/<?php echo e($id_paket); ?>">Tutorial</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <?php if(count($soal) < $paket->jumlah_soal): ?>
      <div class="row">
        <div class="col">
          <div class="alert alert-danger">Jumlah soal yang telah terinput baru <strong><?php echo e(count($soal)); ?> dari <?php echo e($paket->jumlah_soal); ?> soal</strong>. Segera lengkapi datanya!</div>
        </div>
      </div>
      <?php endif; ?>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width="50">No.</th>
              <th>Pilihan A</th>
              <th>Pilihan B</th>
              <th>Pilihan C</th>
              <th>Pilihan D</th>
              <th width="80">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($data->nomor); ?></td>
              <td><span class="badge badge-dark mr-2 mb-2"><?php echo e($data->soal[0]['disc']['A']); ?></span><?php echo e($data->soal[0]['pilihan']['A']); ?></td>
              <td><span class="badge badge-dark mr-2 mb-2"><?php echo e($data->soal[0]['disc']['B']); ?></span><?php echo e($data->soal[0]['pilihan']['B']); ?></td>
              <td><span class="badge badge-dark mr-2 mb-2"><?php echo e($data->soal[0]['disc']['C']); ?></span><?php echo e($data->soal[0]['pilihan']['C']); ?></td>
              <td><span class="badge badge-dark mr-2 mb-2"><?php echo e($data->soal[0]['disc']['D']); ?></span><?php echo e($data->soal[0]['pilihan']['D']); ?></td>
              <td>
                <a href="/hrd/tes/tipe/<?php echo e($id_tes); ?>/soal/edit/<?php echo e($data->id_soal); ?>" class="btn btn-sm btn-info mr-2 mb-2" data-id="<?php echo e($data->id_soal); ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                <a href="#" class="btn btn-sm btn-danger mb-2 delete" data-id="<?php echo e($data->id_soal); ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
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
  .badge {width: 2rem; font-size: inherit;}
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

    // Soal full
    $(document).on("click", ".btn-full", function(e){
      e.preventDefault();
      alert("Sudah tidak bisa menambah soal, karena jumlah soal sudah full!");
    });

    // Delete
    $(document).on("click", ".delete", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var ask = confirm("Anda yakin ingin menghapus data ini?");
      if(ask){
        $.ajax({
          type: "post",
          url: "/hrd/tes/tipe/<?php echo e($id_tes); ?>/soal/delete",
          data: {_token: "<?php echo e(csrf_token()); ?>", id: id},
          success: function(response){
            if(response == "Berhasil menghapus data!"){
              alert(response);
              window.location.href = "/hrd/tes/tipe/<?php echo e($id_tes); ?>/paket/soal/<?php echo e($id_paket); ?>";
            }
          }
        })
      }
    });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/hrd/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/paket-soal/hrd/detail.blade.php ENDPATH**/ ?>