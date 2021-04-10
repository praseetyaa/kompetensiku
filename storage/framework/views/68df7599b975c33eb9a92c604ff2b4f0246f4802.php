

<?php $__env->startSection('title', 'Blog | '); ?>

<?php $__env->startSection('content'); ?>

<!-- Page top Section end -->
<section class="page-top-section set-bg" data-setbg="<?php echo e(asset('templates/loans2go/img/page-top-bg/2.jpg')); ?>">
  <div class="container">
    <h2>Artikel</h2>
    <nav class="site-breadcrumb">
      <a class="sb-item" href="/<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Home</a>
      <span class="sb-item active">Artikel</span>
    </nav>
  </div>
</section>
<!-- Page top Section end -->

<!-- Info Section -->
<section class="info-section spad">
  <div class="container">
    <div class="row">
      <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-lg-6 my-2 bg-light shadow">
        <div class="card-body">
          <h5 class="card-title"><a href="/artikel/<?php echo e($blog->blog_permalink); ?><?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>"><?php echo e($blog->blog_title); ?></a></h5>
          <p class="card-text"><?php echo substr(strip_tags(html_entity_decode($blog->konten)),0,150); ?>...</p>
          <span class="card-link text-secondary small" title="<?php echo e(date('Y-m-d H:i:s', strtotime($blog->blog_at))); ?>" style="cursor: help;">
            <i class="fa fa-clock-o mr-2"></i> <?php echo e(setFullDate($blog->blog_at)); ?>

          </span>
          <span class="card-link text-secondary small"><i class="fa fa-user mr-2"></i> <?php echo e($blog->nama_user); ?></span>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
	<div class="row mt-3" id="pagination">
		<?php echo $blogs->links(); ?>

	</div>
  </div>
</section>
<!-- Info Section end -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
  .info-text {padding-top: 0;}
  .info-text p {margin-bottom: 1rem!important;}
  #pagination nav {margin-right: auto; margin-left: auto;}

  .ql-align-left {text-align: left!important;}
  .ql-align-right {text-align: right!important;}
  .ql-align-center {text-align: center!important;}
  .ql-align-justify {text-align: justify!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/guest/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/psikologanda.com/laravel-akademi/resources/views/blog/guest/blogs.blade.php ENDPATH**/ ?>