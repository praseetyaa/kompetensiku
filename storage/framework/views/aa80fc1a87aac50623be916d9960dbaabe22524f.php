<?php $__env->startSection('title', $blog->blog_title.' - Blog | '); ?>

<?php $__env->startSection('content'); ?>

<!-- Page top Section end -->
<section class="page-top-section set-bg" data-setbg="<?php echo e(asset('templates/loans2go/img/page-top-bg/2.jpg')); ?>">
  <div class="container">
    <h2>Blog</h2>
    <nav class="site-breadcrumb">
      <a class="sb-item" href="/<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Home</a>
      <a class="sb-item" href="/blog<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Blog</a>
      <span class="sb-item active"><?php echo e($blog->blog_title); ?></span>
    </nav>
  </div>
</section>
<!-- Page top Section end -->

<!-- Info Section -->
<section class="info-section spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="info-text">
          <h3 class="mb-3"><?php echo e($blog->blog_title); ?></h3>
          <div class="row">
            <div class="col-12 p-1 text-secondary small" style="background-color: #fdd100;">
              <div class="row">
                <div class="col-md">
                  <span title="<?php echo e(date('Y-m-d H:i:s', strtotime($blog->blog_at))); ?>"><i class="fa fa-clock-o mr-2"></i> <?php echo e(setFullDate($blog->blog_at)); ?></span>
                </div>
                <div class="col-md">
                  <i class="fa fa-user mr-2"></i> <?php echo e($blog->nama_user); ?>

                </div>
              </div>
            </div>
          </div>
          <p><?php echo html_entity_decode($blog->konten); ?></p>
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
  .info-text p {margin-bottom: 1rem!important;}

  .ql-align-left {text-align: left!important;}
  .ql-align-right {text-align: right!important;}
  .ql-align-center {text-align: center!important;}
  .ql-align-justify {text-align: justify!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/guest/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\campusdigital\resources\views/blog/guest/post.blade.php ENDPATH**/ ?>