<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Tes Wawancara</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Data Tes Wawancara</h6>
    </div>
    <div class="card-body">
      <form method="post" action="/applicant/tahap-wawancara/lain-lain/save">
        <?php echo e(csrf_field()); ?>

        <div class="form-row">
          <div class="col-auto p-3 border border-muted mb-2 mr-2">
            <img src="<?php echo e(asset('assets/images/pas-foto/'.$pelamar->pas_foto)); ?>" class="img-fluid" width="200">
          </div>
          <div class="col">
            <div class="row">
              <div class="col-sm-auto ml-sm-auto">
                <p class="font-weight-bold text-md-right">
                  Untuk Jabatan: <?php echo e($pelamar->posisi); ?>

                </p>
              </div>
            </div>
          </div>
        </div>
        <?php if(Session::get('message') != null): ?>
        <div class="form-row">
          <div class="w-100 mt-2">
            <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
              <?php echo e(Session::get('message')); ?>

              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <ul class="nav nav-pills mt-3 mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link bg-warning" href="/applicant/tahap-wawancara/data-diri"><i class="fas fa-user mr-2"></i> Data Diri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-warning" href="/applicant/tahap-wawancara/riwayat-hidup"><i class="fas fa-school mr-2"></i> Riwayat Hidup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/applicant/tahap-wawancara/lain-lain"><i class="fas fa-hand-peace mr-2"></i> Lain-Lain</a>
          </li>
        </ul>
        <div class="form-row">
          <div class="w-100 mt-2 mb-3">
            <div class="alert alert-warning mb-0" role="alert">
              Isilah formulir berikut ini yang meliputi formulir <strong>Data Diri</strong>, <strong>Riwayat Hidup</strong>, dan <strong>Lain-Lain</strong>. Formulir ini akan kami gunakan sebagai bahan pertimbangan dalam tes Anda.
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr>
                <th colspan="2">Lain-Lain</th>
              </tr>
              <tr>
                <td colspan="2">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-title question">Pertanyaan</td>
                      <td class="td-title">Jawaban Anda</td>
                    </tr>
                    <?php if($pelamar->pertanyaan != null): ?>
                      <?php $__currentLoopData = $pelamar->pertanyaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($data['pertanyaan']); ?> <input type="hidden" name="pertanyaan[<?php echo e(($key+1)); ?>][pertanyaan]" value="<?php echo e($data['pertanyaan']); ?>"</td>
                        <td><textarea name="pertanyaan[<?php echo e(($key+1)); ?>][jawaban]" class="form-control form-control-sm" rows="2" required><?php echo e($data['jawaban']); ?></textarea></td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                      <?php $__currentLoopData = $pertanyaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($value); ?> <input type="hidden" name="pertanyaan[<?php echo e(($key+1)); ?>][pertanyaan]" value="<?php echo e($value); ?>"</td>
                        <td><textarea name="pertanyaan[<?php echo e(($key+1)); ?>][jawaban]" class="form-control form-control-sm" rows="2" required></textarea></td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </table>
                </td>
              </tr>
            </table>
          </div>
          <div class="col">
            <strong>* Semua keterangan yang tertulis diatas saya buat dengan jujur dan sungguh – sungguh.</strong>
          </div>
        </div>
        <div class="form-group mt-3">
          <input type="hidden" name="id" value="<?php echo e($pelamar->id_pelamar); ?>">
          <input type="hidden" name="id_user" value="<?php echo e($pelamar->id_user); ?>">
          <button type="submit" class="btn btn-success">Simpan</button>
          <a href="/applicant" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
  .nav-pills .nav-link {border-radius: 0;}
  .table {min-width: 600px;}
  .table tr th {padding: .5rem; text-align: center; text-transform: uppercase; background-color: #57d3ff; color: #333;}
  .table tr td {padding: .5rem;}
  .table tr td.td-label {font-weight: bold; min-width: 200px; width: 200px}
  .table tr td.td-title {font-weight: bold; text-align: center;}
  .table tr td.td-title.name {min-width: 300px; width: 300px}
  .table tr td.td-title.year {min-width: 200px; width: 200px}
  .table tr td.td-title.option {min-width: 100px; width: 100px}
  .table tr td.td-title.question {min-width: 400px; width: 400px}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/applicant/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/tw/applicant/form-3.blade.php ENDPATH**/ ?>