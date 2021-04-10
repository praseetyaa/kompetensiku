<?php $__env->startSection('title', 'Afiliasi | '); ?>

<?php $__env->startSection('content'); ?>

<!-- Page top Section end -->
<section class="page-top-section set-bg" data-setbg="<?php echo e(asset('templates/loans2go/img/page-top-bg/2.jpg')); ?>">
  <div class="container">
    <h2>Afiliasi</h2>
    <nav class="site-breadcrumb">
      <a class="sb-item" href="/<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Home</a>
      <span class="sb-item active">Afiliasi</span>
    </nav>
  </div>
</section>
<!-- Page top Section end -->

<!-- Info Section -->
<section class="info-section spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 text-center mb-2">
        <img src="<?php echo e(asset('assets/images/others/undraw_transfer_money_rywa.svg')); ?>" style="max-width: 360px;" alt="">
      </div>
      <div class="col-lg-7">
        <div class="info-text">
          <h4 class="mb-4">Afiliasi</h4>
          <p>Program afiliasi merupakan program dimana Anda dapat menerima komisi dari kami dengan cara memberikan referensi Campus Digital kepada teman, relasi atau pengunjung website Anda, kemudian pihak yang Anda referensikan tersebut melakukan order & pembayaran. Komisi diberikan sebesar Rp. <?php echo e(number_format(setComission(),0,',','.')); ?> setiap pendaftaran yang berhasil transfer. Fasilitas member untuk mereferensikan yaitu dengan adanya sistem URL Referral, dimana setiap member akan mendapatkannya.</p>
          <p>Contoh URL Referral adalah: <span class="text-danger font-weight-bold"><?php echo e(URL::to('/')); ?>?ref=sukontolegowo</span></p>
          <p>Setiap member yang daftar melalui URL Referral Anda, maka bonus atau komisi akan otomatis masuk ke dalam data komisi yang kemudian bisa diambil kapan saja.</p>
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
<?php echo $__env->make('template/guest/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\campusdigital\resources\views/front/afiliasi.blade.php ENDPATH**/ ?>