

<?php $__env->startSection('title', 'Karir | '); ?>

<?php $__env->startSection('content'); ?>

<section id="breadcrumb-container">
	<div class="container">
		<div class="row">
			<div class="col-12 px-0">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb px-lg-3 px-md-0">
						<li class="breadcrumb-item"><a href="/"><i data-feather="home"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Karir</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>
<section id="main-slide-top">
	<div>
		<div class="title">
			<div class="container">
				<div class="row">
					<div>
						<h1 class="col-12 px-md-0">Karir</h1>
						<p class="col-12 px-md-0"></p>
					</div>
				</div>
			</div>
		</div>
		<div class="overlay"></div>
	</div>
</section>
<section class="my-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="info-text">
			<div class="row">
				<?php $__currentLoopData = $karirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $karir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-3 col-md-6 mb-3">
					<div class="card">
						<a href="/karir/<?php echo e($karir->karir_permalink); ?>">
							<img class="card-img-top" src="<?php echo e($karir->karir_gambar != '' ? asset('assets/images/cover-karir/'.$karir->karir_gambar) : asset('assets/images/others/default.jpg')); ?>" alt="Sampul Karir">
						</a>
						<div class="card-body">
							<a class="link-primary" href="/karir/<?php echo e($karir->karir_permalink); ?>"><h5 class="card-title"><?php echo e($karir->karir_title); ?></h5></a>
							<p class="card-text"><?php echo substr(strip_tags(html_entity_decode($karir->konten)),0,100); ?>... <a class="link-primary" style="display: inline;" href="/karir/<?php echo e($karir->karir_permalink); ?>">Selengkapnya ></a></p>
						</div>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style type="text/css">
  .header-section {background: #340369!important;}
  .info-section {margin-top: 126px!important;}
  #registration-form .h6:before, #registration-form .h6:after {content: '---';}
  label {font-size: .875rem;}

  /* Quill */
  .ql-editor h2 {margin-bottom: 1rem!important; font-weight: 600!important;}
  .ql-editor h3 {margin-bottom: 1rem!important; font-weight: 600!important;}
  .ql-editor ol {padding-left: 30px!important;}
  .ql-editor ol li {font-size: 14px!important; color: #74757f!important; padding-left: 5px!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/guest/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/psikologanda.com/laravel-akademi/resources/views/karir/guest/karirs.blade.php ENDPATH**/ ?>