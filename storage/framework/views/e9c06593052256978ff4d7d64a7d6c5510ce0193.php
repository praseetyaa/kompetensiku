<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Alert -->
    <?php if(Session::get('message') != null): ?>
    <div class="col-12 mb-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(Session::get('message')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    <?php endif; ?>

  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="<?php echo e($ta ? ($ta->hasil == 1 && $tw->hasil == 99 && $isExpired == false) ? 'col-lg-9' : 'col-lg-12' : 'col-lg-12'); ?> mb-4">
      <!-- Informasi -->
      <div class="card shadow mb-4">
        <div class="card-header bg-success py-3">
          <h6 class="m-0 font-weight-bold text-dark">Pengumuman</h6>
        </div>
        <div class="card-body">
          <div class="text-center">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo e(asset('templates/sb-admin-2/img/'.$announcement['image'])); ?>" alt="">
          </div>
          <p class="text-center h5 mt-4"><?php echo e($announcement['message']); ?></p>
        </div>
      </div>
    </div>

    <?php if($ta): ?>
      <?php if($ta->hasil == 1 && $tw->hasil == 99 && $isExpired == false): ?>
      <div class="col-md-6 col-lg-3 mb-4 acara">
        <!-- Tes Wawancara -->
        <div class="card shadow mb-4">
          <div class="card-header bg-warning py-3">
            <h6 class="m-0 font-weight-bold text-dark">Tes Wawancara</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <i class="fa fa-calendar-alt mr-2"></i> <?php echo e(setFullDate($ta->waktu_wawancara)); ?>

            </div>
            <div class="form-group">
              <i class="fa fa-clock mr-2"></i> <?php echo e(date('H:i', strtotime($ta->waktu_wawancara))); ?>

            </div>
            <div class="form-group">
              <i class="fa fa-map-marker-alt mr-2"></i> <?php echo e($ta->tempat_wawancara); ?>

            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
  .acara .fa {width: 20px; text-align: center;}
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<!-- Page level plugins -->
<!-- <script src="<?php echo e(asset('templates/sb-admin-2/vendor/chart.js/Chart.min.js')); ?>"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="<?php echo e(asset('templates/sb-admin-2/js/demo/chart-area-demo.js')); ?>"></script>
<script src="<?php echo e(asset('templates/sb-admin-2/js/demo/chart-pie-demo.js')); ?>"></script> -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/applicant/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/dashboard/applicant/dashboard.blade.php ENDPATH**/ ?>