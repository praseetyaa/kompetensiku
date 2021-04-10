<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Lowongan</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Data Lowongan</h6>
      <a class="btn btn-sm btn-primary" href="/admin/lowongan/create">
        <i class="fas fa-plus fa-sm fa-fw text-gray-400"></i> Tambah Lowongan
      </a>
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
              <th width="200">Posisi</th>
              <th width="80">Pelamar</th>
              <th width="110">Status</th>
              <th width="150">Tanggal</th>
              <th width="170">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php $__currentLoopData = $lowongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($i); ?></td>
              <td><?php echo e($data->judul_lowongan); ?></td>
              <td><?php echo e($data->posisi); ?></td>
              <td><?php echo e($data->pelamar); ?></td>
              <td>
                <select data-id="<?php echo e($data->id_lowongan); ?>" data-value="<?php echo e($data->status); ?>" class="form-control custom-select status">
                  <option value="1" <?php echo e($data->status == 1 ? 'selected' : ''); ?>>Aktif</option>
                  <option value="0" <?php echo e($data->status == 0 ? 'selected' : ''); ?>>Tidak Aktif</option>
                </select>
              </td>
              <td><?php echo e(setFullDate($data->created_at)); ?></td>
              <td>
                <span data-toggle="tooltip" data-placement="bottom" title="Lihat URL">
                  <a href="#" class="btn btn-sm btn-success mr-2 mb-2 show-url" data-id="<?php echo e($data->id_lowongan); ?>" data-url="<?php echo e($data->url_lowongan); ?>"  data-toggle="modal" data-target="#showURLModal"><i class="fa fa-link"></i></a>
                </span>
                <a href="/admin/lowongan/pelamar/<?php echo e($data->id_lowongan); ?>" class="btn btn-sm btn-warning mr-2 mb-2" data-id="<?php echo e($data->id_lowongan); ?>" data-toggle="tooltip" data-placement="top" title="Lihat Pelamar"><i class="fa fa-user-tie"></i></a>
                <a href="/admin/lowongan/edit/<?php echo e($data->id_lowongan); ?>" class="btn btn-sm btn-info mr-2 mb-2" data-id="<?php echo e($data->id_lowongan); ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                <a href="#" class="btn btn-sm btn-danger mb-2 delete" data-id="<?php echo e($data->id_lowongan); ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Show URL Modal-->
  <div class="modal fade" id="showURLModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">URL Formulir</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <label>Berikut adalah URL yang digunakan untuk menuju ke formulir pendaftaran lowongan:</label>
          <div class="input-group">
            <input type="text" id="url" class="form-control" value="<?php echo e(url('/')); ?>" readonly>
            <div class="input-group-append">
              <button class="btn btn-outline-primary btn-copy" type="button" data-toggle="tooltip" data-placement="top" title="Copy to Clipboard"><i class="fa fa-copy"></i></button>
              <button class="btn btn-outline-primary btn-link" type="button" data-toggle="tooltip" data-placement="top" title="Kunjungi URL"><i class="fa fa-link"></i></button>
            </div>
          </div>
          <input type="hidden" id="url-root" value="<?php echo e(url('/')); ?>">
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
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

    // Show URL
    $(document).on("click", ".show-url", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var url = $(this).data("url");
      var url_root = $("#url-root").val();
      $("#url").val(url_root + '/lowongan/' + url);
      $(".btn-link").attr('data-url', url_root + '/lowongan/' + url);
    })

    // Copy to Clipboard
    $(document).on("click", ".btn-copy", function(e){
      e.preventDefault();
      var url = $(this).data("url");
      document.getElementById("url").select();
      document.getElementById("url").setSelectionRange(0, 99999);
      document.execCommand("copy");
      $(this).attr('data-original-title','Copied!');
      $(this).tooltip("show");
      $(this).attr('data-original-title','Copy to Clipboard');
    })

    // Visit URL
    $(document).on("click", ".btn-link", function(e){
      e.preventDefault();
      var url = $(this).data("url");
      window.open(url, '_blank');
    })

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
          url: "/admin/lowongan/update-status",
          data: {_token: "<?php echo e(csrf_token()); ?>", id: id, status: status},
          success: function(response){
            if(response == "Berhasil mengupdate status!"){
              alert(response);
              window.location.href = "/admin/lowongan";
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
          url: "/admin/lowongan/delete",
          data: {_token: "<?php echo e(csrf_token()); ?>", id: id},
          success: function(response){
            if(response == "Berhasil menghapus data!"){
              alert(response);
              window.location.href = "/admin/lowongan";
            }
          }
        })
      }
    });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/lowongan/admin/index.blade.php ENDPATH**/ ?>