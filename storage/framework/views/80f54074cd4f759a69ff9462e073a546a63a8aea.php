<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Seleksi Tahap Wawancara</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Data Seleksi Tahap Wawancara</h6>
<!--       <a class="btn btn-sm btn-primary" href="/pelamar/create">
        <i class="fas fa-plus fa-sm fa-fw text-gray-400"></i> Tambah Pelamar
      </a> -->
    </div>
    <div class="card-body">
      <?php if(Session::get('message') != null): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?php echo e(Session::get('message')); ?>

          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width="50">No.</th>
              <th>Nama</th>
              <th width="150">No. HP</th>
              <th width="150">Posisi</th>
              <th width="110">Status</th>
              <th width="180">Tanggal Wawancara</th>
              <th width="100">Hasil</th>
              <th width="40">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php $__currentLoopData = $tw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($i); ?></td>
              <td><a href="/admin/pelamar/profile/<?php echo e($data->id_pelamar); ?>"><?php echo e($data->nama_lengkap); ?></a></td>
              <td><?php echo e($data->nomor_hp); ?></td>
              <td><?php echo e($data->posisi->posisi); ?></td>
              <td>
                <select data-id="<?php echo e($data->id_tw); ?>" data-value="<?php echo e($data->buka); ?>" class="form-control custom-select status" <?php echo e($data->hasil != 99 ? 'disabled' : ''); ?>>
                  <option value="1" <?php echo e($data->buka == 1 ? 'selected' : ''); ?>>Buka</option>
                  <option value="0" <?php echo e($data->buka == 0 ? 'selected' : ''); ?>>Tidak Buka</option>
                </select>
              </td>
              <td><?php echo e($data->tahap_administrasi->waktu_wawancara != null ? setFullDate($data->tahap_administrasi->waktu_wawancara) : '-'); ?> <br><?php echo e($data->tahap_administrasi->waktu_wawancara != null ? '('.date('H:i', strtotime($data->tahap_administrasi->waktu_wawancara)).')' : ''); ?></td>
              <td>
                <?php if($data->hasil == 1): ?>
                  <span class="text-success font-weight-bold">Diterima</span>
                <?php elseif($data->hasil == 0): ?>
                  <span class="text-danger font-weight-bold">Tidak Diterima</span>
                <?php elseif($data->hasil == 99): ?>
                  <span class="text-info font-weight-bold">Belum Diwawancarai</span>
                <?php endif; ?>
              </td>
              <td>
                <!-- <a href="/admin/tahap-wawancara/<?php echo e($data->id_tw); ?>" class="btn btn-sm btn-info mr-2 mb-2" data-id="<?php echo e($data->id_tw); ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a> -->
                <!-- <a href="#" class="btn btn-sm btn-block btn-danger mb-2 delete" data-id="<?php echo e($data->id_tw); ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a> -->
                #
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
  /*td a.btn {width: 36px;}*/
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
          url: "/admin/tahap-wawancara/update-status",
          data: {_token: "<?php echo e(csrf_token()); ?>", id: id, status: status},
          success: function(response){
            if(response == "Berhasil mengupdate status!"){
              alert(response);
              window.location.href = "/admin/tahap-wawancara";
            }
          }
        })
      }
    });

    // Delete
    $(document).on("click", ".delete", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var ask = confirm("Anda yakin ingin menghapus data ini?");
      if(ask){
        $.ajax({
          type: "post",
          url: "/admin/tahap-wawancara/delete",
          data: {_token: "<?php echo e(csrf_token()); ?>", id: id},
          success: function(response){
            if(response == "Berhasil menghapus data!"){
              alert(response);
              window.location.href = "/admin/tahap-wawancara";
            }
          }
        })
      }
    });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/tw/admin/index.blade.php ENDPATH**/ ?>