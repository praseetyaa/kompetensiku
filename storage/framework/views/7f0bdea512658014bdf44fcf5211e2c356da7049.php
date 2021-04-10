<?php $__env->startSection('title', $kategori->kategori.' | '); ?>

<?php $__env->startSection('content'); ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo e(asset('templates/lifecoach/images/bg_2.jpg')); ?>');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end">
      <div class="col-md-12 ftco-animate my-auto">
        <p class="breadcrumbs mb-2">
          <span class="mr-0"><a href="/<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span>
          <span class="mr-0"><a href="#">Kategori <i class="ion-ios-arrow-forward"></i></a></span>
          <span><?php echo e($kategori->kategori); ?> <i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-0 bread"><?php echo e($kategori->kategori); ?></h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-white">
  <div class="container">
    <div class="row d-flex">
      <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <a href="/artikel/<?php echo e($blog->blog_permalink); ?>" class="block-20 rounded" style="background-image: url('<?php echo e($blog->blog_gambar != '' ? asset('assets/images/blog/'.$blog->blog_gambar) : asset('assets/images/default/artikel.jpg')); ?>');">
          </a>
          <div class="text mt-3">
            <div class="meta mb-2">
              <div><a href="#" class="meta-chat"><span class="fa fa-calendar"></span> <?php echo e(date('d/m/Y', strtotime($blog->blog_at))); ?></a></div>
              <div><a href="#" class="meta-chat"><span class="fa fa-user"></span> <?php echo e($blog->nama_user); ?></a></div>
              <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> <?php echo e(count_comments($blog->id_blog)); ?></a></div>
            </div>
            <h3 class="heading"><a href="/artikel/<?php echo e($blog->blog_permalink); ?>"><?php echo e($blog->blog_title); ?></a></h3>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row mt-5">
      <div class="col-auto mx-auto text-center">
          <?php echo $blogs->links(); ?>

      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
  .breadcrumbs .mr-0:after {content: '/';}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/guest/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/artikel/guest/kategori.blade.php ENDPATH**/ ?>