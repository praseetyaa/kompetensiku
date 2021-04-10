<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Detail Hasil Tes</h1>
  <p class="mb-4">Hasil tes yang telah dilakukan oleh pelamar dalam seleksi penerimaan.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Detail Hasil Tes</h6>
    </div>
      <div class="card-body">
        <div class="row">
          <div class="col-auto ml-auto">
            <!-- <a href="/disc/test/print-pdf" class="btn btn-sm btn-primary btn-print"><i class="fa fa-print"></i> Print</a> -->
          </div>
        </div>
        <div class="row">
          <div class="col-auto mx-auto">
            <table class="table table-borderless">
              <tr>
                <td width="250">Nama: <?php echo e($user->nama_lengkap); ?></td>
                <td width="250">Usia: <?php echo e($user->umur); ?> tahun</td>
                <td width="250">Jenis Kelamin: <?php echo e($user->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan'); ?></td>
                <td width="250">Tes: <?php echo e($hasil->nama_tes); ?></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-auto mb-5">
            <table class="table-bordered">
              <thead bgcolor="#bebebe">
                <tr>
                  <th width="50" rowspan="2">#</th>
                  <th width="100">MOST</th>
                  <th width="100">LEAST</th>
                </tr>
                <tr>
                  <!-- <th width="80">Jumlah</th> -->
                  <th width="80">Skor</th>
                  <!-- <th width="80">Jumlah</th> -->
                  <th width="80">Skor</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $disc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td align="center" bgcolor="#bebebe"><strong><?php echo e($letter); ?></strong></td>
                  <td align="center" bgcolor="#eeeeee"><?php echo e(array_key_exists($letter, $disc_score_m) ? $disc_score_m[$letter]['score'] : 0); ?></td>
                  <td align="center" bgcolor="#eeeeee"><?php echo e(array_key_exists($letter, $disc_score_l) ? $disc_score_l[$letter]['score'] : 0); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
            <div class="row mt-4">
              <div class="col">
                <p class="text-center mb-0 font-weight-bold">Response to the Environment</p>
                <p class="text-center mb-0 font-weight-bold">MOST</p>
                <p class="text-center mb-0 font-weight-bold">Adapted: (<?php echo implode("-", $code_m) ?>)</p>
                <canvas class="mt-3" id="mostChart" width="200" height="200"></canvas>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col">
                <p class="text-center mb-0 font-weight-bold">Basic Style</p>
                <p class="text-center mb-0 font-weight-bold">LEAST</p>
                <p class="text-center mb-0 font-weight-bold">Natural: (<?php echo implode("-", $code_l) ?>)</p>
                <canvas class="mt-3" id="leastChart" width="200" height="200"></canvas>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="row">
              <div class="col">
                <p class="h4 text-center font-weight-bold mb-3">Deskripsi</p>
                <div class="p-2 deskripsi"><?php echo html_entity_decode($hasil_keterangan); ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
  table tr th, table tr td {padding: .25rem .5rem; text-align: center;}
  .deskripsi {border-style: groove; columns: 2; font-size: smaller;}
  .deskripsi p {margin-bottom: .5rem;}
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
<script type="text/javascript">
var ctx1 = document.getElementById('mostChart').getContext('2d');
var mostChart = new Chart(ctx1, {
    type: 'line',
    data: {
        labels: ['D', 'I', 'S', 'C'],
        datasets: [{
            label: 'Score',
            data: [<?php echo e(array_key_exists('D', $disc_score_m) ? $disc_score_m['D']['score'] : 0); ?>, <?php echo e(array_key_exists('I', $disc_score_m) ? $disc_score_m['I']['score'] : 0); ?>, <?php echo e(array_key_exists('S', $disc_score_m) ? $disc_score_m['S']['score'] : 0); ?>, <?php echo e(array_key_exists('C', $disc_score_m) ? $disc_score_m['C']['score'] : 0); ?>],
            fill: false,
            backgroundColor: '#FF6B8A',
            borderColor: '#FF6B8A',
            lineTension: 0
        }]
    },
    options: {
      responsive: true,
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 100,
                    stepSize: 25
                }
            }]
        }
    }
});

var ctx2 = document.getElementById('leastChart').getContext('2d');
var leastChart = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: ['D', 'I', 'S', 'C'],
        datasets: [{
            label: 'Score',
            data: [<?php echo e(array_key_exists('D', $disc_score_l) ? $disc_score_l['D']['score'] : 0); ?>, <?php echo e(array_key_exists('I', $disc_score_l) ? $disc_score_l['I']['score'] : 0); ?>, <?php echo e(array_key_exists('S', $disc_score_l) ? $disc_score_l['S']['score'] : 0); ?>, <?php echo e(array_key_exists('C', $disc_score_l) ? $disc_score_l['C']['score'] : 0); ?>],
            fill: false,
            backgroundColor: '#fd7e14',
            borderColor: '#fd7e14',
            lineTension: 0
        }]
    },
    options: {
      responsive: true,
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 100,
                    stepSize: 25
                }
            }]
        }
    }
});

$(document).on("click", ".btn-print", function(e){
  e.preventDefault();
  window.print();
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/hrd/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/hasil/hrd/detail.blade.php ENDPATH**/ ?>