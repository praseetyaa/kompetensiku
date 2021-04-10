<?php $__env->startSection('title', $halaman->halaman_title.' | '); ?>

<?php $__env->startSection('content'); ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo e(asset('templates/lifecoach/images/bg_2.jpg')); ?>');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end">
      <div class="col-md-12 ftco-animate my-auto">
        <p class="breadcrumbs mb-2">
          <span class="mr-0"><a href="/<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span>
          <span><?php echo e($halaman->halaman_title); ?> <i class="ion-ios-arrow-forward"></i></span>
        </p>
        <h1 class="mb-0 bread"><?php echo e($halaman->halaman_title); ?></h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-degree-bg bg-white">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 ftco-animate">
        <h2 class="mb-3"><?php echo e($halaman->halaman_title); ?></h2>
		<div class="ql-snow"><div class="ql-editor p-0"><?php echo html_entity_decode($halaman->konten); ?></div></div>
      </div> <!-- .col-md-8 -->
    </div>
  </div>
</section> <!-- .section -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style type="text/css">
  .breadcrumbs .mr-0:after {content: '/';}
  /* Quill */
  .ql-editor h2, .ql-editor h3 {margin-bottom: 1rem!important; font-weight: 600!important;}
  .ql-editor p {margin-bottom: 1rem!important; line-height: 1.8!important;}
  .ql-editor ol {padding-left: 30px!important;}
  .ql-editor ol li {font-size: 14px!important; color: #74757f!important; padding-left: 5px!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/guest/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/halaman/guest/page.blade.php ENDPATH**/ ?>