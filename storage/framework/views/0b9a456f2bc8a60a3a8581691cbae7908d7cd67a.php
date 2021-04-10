<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Seleksi</h1>
  <p class="mb-4">Seleksi bagi pelamar yang mendaftar di perusahaan.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Data Seleksi</h6>
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
              <th width="150">Hasil</th>
              <th width="180">Tanggal Wawancara</th>
              <th width="80">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php $__currentLoopData = $seleksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($i); ?></td>
              <td><a href="/admin/pelamar/profile/<?php echo e($data->id_pelamar); ?>"><?php echo e($data->nama_lengkap); ?></a></td>
              <td><?php echo e($data->nomor_hp); ?></td>
              <td><?php echo e($data->posisi); ?></td>
              <td>
                <?php if($data->hasil == 1): ?>
                  Lolos
                <?php elseif($data->hasil == 0): ?>
                  Tidak Lolos
                <?php elseif($data->hasil == 99): ?>
                  Belum Diwawancara
                <?php endif; ?>
              </td>
              <td><?php echo e($data->waktu_wawancara != null ? setFullDate($data->waktu_wawancara) : '-'); ?> <br><?php echo e($data->waktu_wawancara != null ? '('.date('H:i', strtotime($data->waktu_wawancara)).')' : ''); ?></td>
              <td>
                <a href="#" class="btn btn-sm btn-info mr-2 mb-2 edit" data-id="<?php echo e($data->id_seleksi); ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                <a href="#" class="btn btn-sm btn-danger mb-2 delete" data-id="<?php echo e($data->id_seleksi); ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Set Test Time Modal-->
  <div class="modal fade" id="TimeTestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Seleksi</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form method="post" action="/admin/seleksi/update">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            <div class="form-group">
              <label>Hasil:</label>
              <select name="hasil" id="hasil" class="form-control custom-select">
                <option value="" disabled selected>--Pilih--</option>
                <option value="1" <?php echo e(old('hasil') == 1 ? 'selected' : ''); ?>>Lolos</option>
                <option value="0" <?php echo e(old('hasil') == 0 ? 'selected' : ''); ?>>Tidak Lolos</option>
                <option value="99" <?php echo e(old('hasil') == 99 ? 'selected' : ''); ?>>Belum Diwawancara</option>
              </select>
              <?php if($errors->has('hasil')): ?>
                <small class="text-danger"><?php echo e(ucfirst($errors->first('hasil'))); ?></small>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>Tanggal:</label>
              <div class="input-group">
                <input type="text" id="tanggal" name="tanggal" class="form-control <?php echo e($errors->has('tanggal') ? 'border-danger' : ''); ?>" value="<?php echo e(old('tanggal')); ?>" placeholder="Format: yyyy-mm-dd" readonly>
                <div class="input-group-append">
                  <button class="btn <?php echo e($errors->has('tanggal') ? 'btn-outline-danger' : 'btn-outline-primary'); ?> btn-show-datepicker" type="button" data-toggle="tooltip" data-placement="top" title="Atur Tanggal"><i class="fa fa-calendar"></i></button>
                </div>
              </div>
              <?php if($errors->has('tanggal')): ?>
                <small class="text-danger"><?php echo e(ucfirst($errors->first('tanggal'))); ?></small>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>Jam:</label>
              <div class="input-group">
                <input type="text" id="jam" name="jam" class="form-control <?php echo e($errors->has('jam') ? 'border-danger' : ''); ?>" value="<?php echo e(old('jam')); ?>" placeholder="Format: H:m" readonly data-placement="bottom" data-align="top" data-autoclose="true">
                <div class="input-group-append">
                  <button class="btn <?php echo e($errors->has('jam') ? 'btn-outline-danger' : 'btn-outline-primary'); ?> btn-show-clockpicker" type="button" data-toggle="tooltip" data-placement="top" title="Atur Jam"><i class="fa fa-clock"></i></button>
                </div>
              </div>
              <?php if($errors->has('jam')): ?>
                <small class="text-danger"><?php echo e(ucfirst($errors->first('jam'))); ?></small>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>Tempat:</label>
              <div class="input-group">
                <input type="text" id="tempat" name="tempat" class="form-control <?php echo e($errors->has('tempat') ? 'border-danger' : ''); ?>" value="<?php echo e(old('tempat')); ?>" placeholder="Tempat Wawancara">
              </div>
              <?php if($errors->has('tempat')): ?>
                <small class="text-danger"><?php echo e(ucfirst($errors->first('tempat'))); ?></small>
              <?php endif; ?>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="id" id="id" value="<?php echo e(old('id')); ?>">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<!-- Custom styles for this page -->
<link href="<?php echo e(asset('templates/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css" integrity="sha256-lBtf6tZ+SwE/sNMR7JFtCyD44snM3H2FrkB/W400cJA=" crossorigin="anonymous" />

<!-- CSS -->
<style type="text/css">
  td a.btn {width: 36px;}
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<!-- Page level plugins -->
<script src="<?php echo e(asset('templates/sb-admin-2/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js" integrity="sha256-LPgEyZbedErJpp8m+3uasZXzUlSl9yEY4MMCEN9ialU=" crossorigin="anonymous"></script>

<!-- JavaScripts -->
<script type="text/javascript">
  $(document).ready(function() {
    // Call the dataTables jQuery plugin
    $('#dataTable').DataTable();

    $('input[name=tanggal]').datepicker({
      format: 'yyyy-mm-dd',
    });

    $("input[name=jam]").clockpicker();

    $(document).on("click", ".btn-show-datepicker", function(e){
      e.preventDefault();
      $('input[name=tanggal]').focus();
    });

    $(document).on("click", ".btn-show-clockpicker", function(e){
      e.preventDefault();
      $('input[name=jam]').focus();
    })

    // Button Not Allowed
    $(document).on("click", ".not-allowed", function(e){
      e.preventDefault();
    });

    // Edit
    $(document).on("click", ".edit", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      $.ajax({
        type: "post",
        url: "/admin/seleksi/data",
        data: {_token: "<?php echo e(csrf_token()); ?>", id: id},
        success: function(response){
          var result = JSON.parse(response);
          if(result.hasil == 1 || result.hasil == 99){
            $("#hasil").val(result.hasil);
            $("#tanggal").val(result.waktu_wawancara.split(" ")[0]);
            $("#jam").val(result.waktu_wawancara.split(" ")[1].substr(0,5));
            $("#tempat").val(result.tempat_wawancara);
            $("#id").val(result.id_seleksi);
          }
          else if(result.hasil == 0){
            $("#hasil").val(result.hasil);
            $("#tanggal").val(null);
            $("#jam").val(null);
            $("#tempat").val(null);
            $("#id").val(result.id_seleksi);
          }
          $("#TimeTestModal").modal("show");
        }
      });
    });

    // Delete
    $(document).on("click", ".delete", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var ask = confirm("Anda yakin ingin menghapus data ini?");
      if(ask){
        $.ajax({
          type: "post",
          url: "/admin/seleksi/delete",
          data: {_token: "<?php echo e(csrf_token()); ?>", id: id},
          success: function(response){
            if(response == "Berhasil menghapus data!"){
              alert(response);
              window.location.href = "/admin/seleksi";
            }
          }
        })
      }
    });
  });
</script>

<?php if(count($errors) > 0): ?>
<script type="text/javascript">
  $(function(){
    // Show modal when the page is loaded
    $("#TimeTestModal").modal("toggle");
  });
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/seleksi/admin/index.blade.php ENDPATH**/ ?>