<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Edit Soal DISC Test</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Soal DISC Test</h6>
    </div>
    <div class="card-body">
      <form method="post" action="/admin/disc/soal/update">
        <?php echo e(csrf_field()); ?>

        <div class="form-row">
          <div class="form-group col-auto">
            <label>No. Soal:</label>
            <select name="nomor" class="form-control custom-select <?php echo e($errors->has('nomor') ? 'is-invalid' : ''); ?>">
              <option value="" disabled selected>--Pilih--</option>
              <?php $__currentLoopData = $no_soal_tersedia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($no); ?>" <?php echo e($soal->nomor == $no ? 'selected' : ''); ?>><?php echo e($no); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <input type="hidden" name="nomor_old" value="<?php echo e($soal->nomor); ?>">
            <?php if($errors->has('nomor')): ?>
            <div class="invalid-feedback">
              <?php echo e(ucfirst($errors->first('nomor'))); ?>

            </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-row">
              <div class="form-group col-12 col-sm">
                <label>Pilihan A:</label>
                <input type="text" name="pilihan[A]" class="form-control pilihan <?php echo e($errors->has('pilihan.A') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Pilihan A" value="<?php echo e($soal->soal[0]['pilihan']['A']); ?>">
                <?php if($errors->has('pilihan.A')): ?>
                <div class="invalid-feedback">
                  <?php echo e(str_replace(".", " ", ucfirst($errors->first('pilihan.A')))); ?>

                </div>
                <?php endif; ?>
              </div>
              <div class="form-group col-12 col-sm-auto">
                <label>DISC A:</label>
                <select name="disc[A]" class="form-control custom-select disc <?php echo e($errors->has('disc.A') ? 'is-invalid' : ''); ?>" data-id="disc-a">
                  <option value="">--Pilih--</option>
                  <option value="D" <?php echo e($soal->soal[0]['disc']['A'] == 'D' ? 'selected' : ''); ?>>D</option>
                  <option value="I" <?php echo e($soal->soal[0]['disc']['A'] == 'I' ? 'selected' : ''); ?>>I</option>
                  <option value="S" <?php echo e($soal->soal[0]['disc']['A'] == 'S' ? 'selected' : ''); ?>>S</option>
                  <option value="C" <?php echo e($soal->soal[0]['disc']['A'] == 'C' ? 'selected' : ''); ?>>C</option>
                </select>
                <?php if($errors->has('disc.A')): ?>
                <div class="invalid-feedback">
                  <?php echo e(str_replace(".", " ", ucfirst($errors->first('disc.A')))); ?>

                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-row">
              <div class="form-group col-12 col-sm">
                <label>Pilihan B:</label>
                <input type="text" name="pilihan[B]" class="form-control pilihan <?php echo e($errors->has('pilihan.B') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Pilihan B" value="<?php echo e($soal->soal[0]['pilihan']['B']); ?>">
                <?php if($errors->has('pilihan.B')): ?>
                <div class="invalid-feedback">
                  <?php echo e(str_replace(".", " ", ucfirst($errors->first('pilihan.B')))); ?>

                </div>
                <?php endif; ?>
              </div>
              <div class="form-group col-12 col-sm-auto">
                <label>DISC B:</label>
                <select name="disc[B]" class="form-control custom-select disc <?php echo e($errors->has('disc.B') ? 'is-invalid' : ''); ?>" data-id="disc-b">
                  <option value="">--Pilih--</option>
                  <option value="D" <?php echo e($soal->soal[0]['disc']['B'] == 'D' ? 'selected' : ''); ?>>D</option>
                  <option value="I" <?php echo e($soal->soal[0]['disc']['B'] == 'I' ? 'selected' : ''); ?>>I</option>
                  <option value="S" <?php echo e($soal->soal[0]['disc']['B'] == 'S' ? 'selected' : ''); ?>>S</option>
                  <option value="C" <?php echo e($soal->soal[0]['disc']['B'] == 'C' ? 'selected' : ''); ?>>C</option>
                </select>
                <?php if($errors->has('disc.B')): ?>
                <div class="invalid-feedback">
                  <?php echo e(str_replace(".", " ", ucfirst($errors->first('disc.B')))); ?>

                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-row">
              <div class="form-group col-12 col-sm">
                <label>Pilihan C:</label>
                <input type="text" name="pilihan[C]" class="form-control pilihan <?php echo e($errors->has('pilihan.C') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Pilihan C" value="<?php echo e($soal->soal[0]['pilihan']['C']); ?>">
                <?php if($errors->has('pilihan.C')): ?>
                <div class="invalid-feedback">
                  <?php echo e(str_replace(".", " ", ucfirst($errors->first('pilihan.C')))); ?>

                </div>
                <?php endif; ?>
              </div>
              <div class="form-group col-12 col-sm-auto">
                <label>DISC C:</label>
                <select name="disc[C]" class="form-control custom-select disc <?php echo e($errors->has('disc.C') ? 'is-invalid' : ''); ?>" data-id="disc-c">
                  <option value="">--Pilih--</option>
                  <option value="D" <?php echo e($soal->soal[0]['disc']['C'] == 'D' ? 'selected' : ''); ?>>D</option>
                  <option value="I" <?php echo e($soal->soal[0]['disc']['C'] == 'I' ? 'selected' : ''); ?>>I</option>
                  <option value="S" <?php echo e($soal->soal[0]['disc']['C'] == 'S' ? 'selected' : ''); ?>>S</option>
                  <option value="C" <?php echo e($soal->soal[0]['disc']['C'] == 'C' ? 'selected' : ''); ?>>C</option>
                </select>
                <?php if($errors->has('disc.C')): ?>
                <div class="invalid-feedback">
                  <?php echo e(str_replace(".", " ", ucfirst($errors->first('disc.C')))); ?>

                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-row">
              <div class="form-group col-12 col-sm">
                <label>Pilihan D:</label>
                <input type="text" name="pilihan[D]" class="form-control pilihan <?php echo e($errors->has('pilihan.D') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Pilihan D" value="<?php echo e($soal->soal[0]['pilihan']['D']); ?>">
                <?php if($errors->has('pilihan.D')): ?>
                <div class="invalid-feedback">
                  <?php echo e(str_replace(".", " ", ucfirst($errors->first('pilihan.D')))); ?>

                </div>
                <?php endif; ?>
              </div>
              <div class="form-group col-12 col-sm-auto">
                <label>DISC D:</label>
                <select name="disc[D]" class="form-control custom-select disc <?php echo e($errors->has('disc.D') ? 'is-invalid' : ''); ?>" data-id="disc-d">
                  <option value="">--Pilih--</option>
                  <option value="D" <?php echo e($soal->soal[0]['disc']['D'] == 'D' ? 'selected' : ''); ?>>D</option>
                  <option value="I" <?php echo e($soal->soal[0]['disc']['D'] == 'I' ? 'selected' : ''); ?>>I</option>
                  <option value="S" <?php echo e($soal->soal[0]['disc']['D'] == 'S' ? 'selected' : ''); ?>>S</option>
                  <option value="C" <?php echo e($soal->soal[0]['disc']['D'] == 'C' ? 'selected' : ''); ?>>C</option>
                </select>
                <?php if($errors->has('disc.D')): ?>
                <div class="invalid-feedback">
                  <?php echo e(str_replace(".", " ", ucfirst($errors->first('disc.D')))); ?>

                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <input type="hidden" name="id" value="<?php echo e($soal->id_soal); ?>">
          <input type="hidden" name="id_paket" value="<?php echo e($id_paket); ?>">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/admin/disc/paket/soal/<?php echo e($id_paket); ?>" class="btn btn-secondary">Kembali</a>
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

    // Change value on select
    $(document).on("change", ".disc", function(){
      var id = $(this).data("id");
      var value = $(this).val();
      var arrayValue = [];
      var arrayId = [];

      $(".disc").each(function(key,elem){
        if($(elem).data("id") != id){
          arrayValue.push($(elem).val());
          arrayId.push($(elem).data("id"));
        }
      });

      if($.inArray(value, arrayValue)>=0){
        var index = arrayValue.indexOf(value);
        $(".disc[data-id=" + arrayId[index] + "]").val("");
      }
    });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/disc/admin/edit.blade.php ENDPATH**/ ?>