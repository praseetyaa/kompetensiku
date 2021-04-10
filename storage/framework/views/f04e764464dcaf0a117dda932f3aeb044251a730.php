<?php $__env->startSection('title', $blog->blog_title.' - Artikel | '); ?>

<?php $__env->startSection('content'); ?>

<!-- Page top Section end -->
<section class="page-top-section set-bg" data-setbg="<?php echo e(asset('templates/loans2go/img/page-top-bg/2.jpg')); ?>">
  <div class="container">
    <h2>Artikel</h2>
    <nav class="site-breadcrumb">
      <a class="sb-item" href="/<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Home</a>
      <a class="sb-item" href="/artikel<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Artikel</a>
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
          <div class="">
            <div class="col-12 p-1 text-secondary small" style="background-color: #fdd100;">
              <div class="row">
                <div class="col-md">
                  <span title="<?php echo e(date('Y-m-d H:i:s', strtotime($blog->blog_at))); ?>"><i class="fa fa-clock-o mr-2"></i> <?php echo e(generate_date($blog->blog_at)); ?></span>
                </div>
                <div class="col-md">
                  <i class="fa fa-user mr-2"></i> <?php echo e($blog->nama_user); ?>

                </div>
              </div>
            </div>
          </div>
			<div class="row mt-3">
				<div class="col-12">
					<img src="<?php echo e($blog->blog_gambar != '' ? asset('assets/images/blog/'.$blog->blog_gambar) : asset('assets/images/default/artikel.jpg')); ?>" class="img-fluid">
				</div>
			</div>
          	<div class="ql-snow mt-2"><div class="ql-editor"><?php echo html_entity_decode($blog->konten); ?></div></div>
		  	<div class="row mt-1">
			  <div class="col-12">
				  <?php $__currentLoopData = $blog_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  <span class="badge badge-primary"><?php echo e($tag->tag); ?></span>
				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  </div>
			</div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Info Section end -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style type="text/css">
  .info-text {padding-top: 0;}
  .info-text p {margin-bottom: 1rem!important;}

  /* Quill */
  .ql-editor h2 {margin-bottom: 1rem!important; font-weight: 600!important;}
  .ql-editor h3 {margin-bottom: 1rem!important; font-weight: 600!important;}
  .ql-editor ol {padding-left: 30px!important;}
  .ql-editor ol li {font-size: 14px!important; color: #74757f!important; padding-left: 5px!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/guest/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms-v2\resources\views/artikel/guest/post.blade.php ENDPATH**/ ?>