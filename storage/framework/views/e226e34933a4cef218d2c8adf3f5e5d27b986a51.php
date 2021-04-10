

<?php $__env->startSection('title', 'Tentang Kami | '); ?>

<?php $__env->startSection('content'); ?>

<!-- Page top Section end -->
<section class="page-top-section set-bg" data-setbg="<?php echo e(asset('templates/loans2go/img/page-top-bg/2.jpg')); ?>">
  <div class="container">
    <h2>Tentang Kami</h2>
    <nav class="site-breadcrumb">
      <a class="sb-item" href="/<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Home</a>
      <span class="sb-item active">Tentang Kami</span>
    </nav>
  </div>
</section>
<!-- Page top Section end -->

<!-- Info Section -->
<section class="info-section spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 text-center mb-2">
        <img src="<?php echo e(asset('assets/images/others/meeting2.png')); ?>" style="max-width: 360px;" alt="">
      </div>
      <div class="col-lg-7">
        <div class="info-text">
          <h4 class="mb-4">Tentang Kami</h4>
          <p>Era digital telah berkembang pesat, kebutuhan terhadap tenaga digital marketing semakin tinggi dalam melaksanakan marketing di dunia online dan digital. Oleh karena itu kami hadir untuk melahirkan SDM yang memiliki kompetensi di bidang digital marketing.</p>
          <p>Dengan memiliki mentor yang ahli di bidangnya, lulusan Campus Digital kami harap akan menjadi tenaga kerja baru di bidang teknologi digital marketing atau menjadi wirausaha yang memiliki marketing online yang handal.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Info Section end -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
  .info-text {padding-top: 0;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/guest/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/psikologanda.com/laravel-akademi/resources/views/front/tentang-kami.blade.php ENDPATH**/ ?>