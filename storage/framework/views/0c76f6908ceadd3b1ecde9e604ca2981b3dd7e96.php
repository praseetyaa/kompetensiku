<?php $__env->startSection('content'); ?>

<div class="hero-wrap">
	<div class="home-slider owl-carousel">
		<?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="slider-item" style="background-image:url(<?php echo e(asset('assets/images/slider/'.$data->slider)); ?>);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-center">
					<div class="col-md-10 ftco-animate">
						<div class="text w-100 text-center">
							<h2>We are your personal life coach</h2>
							<h1 class="mb-4">Discover the secrets of life</h1>
							<p><a href="#" class="btn btn-white">Connect with us</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div>

<section class="ftco-section bg-white">
	<div class="container">
		<div class="row justify-content-center pb-5 mb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<h2>Apa sih <?php echo e(get_website_name()); ?>?</h2>
				<span class="subheading">Deskripsi</span>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<p class="text-center">
				<?php echo nl2br($deskripsi->deskripsi); ?>

				</p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center pb-5 mb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<h2>Apa saja yang bisa kami bantu?</h2>
				<span class="subheading">Layanan Kami</span>
			</div>
		</div>
		<div class="row justify-content-center">
			<?php $__currentLoopData = $layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-md-4 d-flex services align-self-stretch px-4 mb-4 ftco-animate">
				<div class="d-block text-center">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="<?php echo e($data->layanan_icon); ?>"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading"><?php echo e($data->layanan); ?></h3>
						<p><?php echo e($data->layanan_caption); ?></p>
					</div>
				</div>      
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</section>

<section class="ftco-section testimony-section bg-primary">
	<div class="container">
		<div class="row justify-content-center pb-5 mb-3">
			<div class="col-md-7 heading-section heading-section-white text-center ftco-animate">
				<h2>Klien yang puas dengan Kami</h2>
				<span class="subheading">Testimoni</span>
			</div>
		</div>
		<div class="row ftco-animate">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel ftco-owl">
					<?php $__currentLoopData = $testimoni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="item">
						<div class="testimony-wrap py-4">
							<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
							<div class="text">
								<p class="mb-4"><?php echo e($data->testimoni); ?></p>
								<div class="d-flex align-items-center">
								<div class="user-img" style="background-image: url('<?php echo e($data->foto_klien != '' ? asset('assets/images/testimoni/'.$data->foto_klien) : asset('assets/images/default/testimoni.jpg')); ?>')"></div>
									<div class="pl-3">
										<p class="name"><?php echo e($data->klien); ?></p>
										<span class="position"><?php echo e($data->profesi_klien); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-white">
	<div class="container">
		<div class="row justify-content-center pb-5 mb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<h2>Artikel dan blog terbaru</h2>
				<span class="subheading">Artikel & Blog</span>
			</div>
		</div>
		<div class="row d-flex">
			<?php $__currentLoopData = $artikel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-md-4 d-flex ftco-animate">
				<div class="blog-entry align-self-stretch">
				<a href="/artikel/<?php echo e($data->blog_permalink); ?>" class="block-20 rounded" style="background-image: url('<?php echo e($data->blog_gambar != '' ? asset('assets/images/blog/'.$data->blog_gambar) : asset('assets/images/default/artikel.jpg')); ?>');">
				</a>
				<div class="text mt-3">
					<div class="meta mb-2">
					<div><a href="#" class="meta-chat"><span class="fa fa-calendar"></span> <?php echo e(date('d/m/Y', strtotime($data->blog_at))); ?></a></div>
					<div><a href="#" class="meta-chat"><span class="fa fa-user"></span> <?php echo e($data->nama_user); ?></a></div>
					<div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> <?php echo e(count_comments($data->id_blog)); ?></a></div>
					</div>
					<h3 class="heading"><a href="/artikel/<?php echo e($data->blog_permalink); ?>"><?php echo e($data->blog_title); ?></a></h3>
				</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		<div class="row justify-content-center pb-5 mb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<a class="btn btn-primary" href="/artikel">Lihat Semua</a>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center pb-5 mb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<h2>Beberapa partner kami</h2>
				<span class="subheading">Mitra</span>
			</div>
		</div>
		<div class="row d-flex">
			<div class="col-md-12">
				<div class="owl-carousel ftco-owl carousel-mitra">
					<?php $__currentLoopData = $mitra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="text-center" data-aos="fade-down">
						<p class="h6 mb-3"><?php echo e($data->nama_mitra); ?></p>
						<img src="<?php echo e(asset('assets/images/mitra/'.$data->logo_mitra)); ?>" class="mb-3 mx-auto" style="max-height: 100px!important; width: auto!important;">
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script type="text/javascript">
	$(".carousel-mitra").owlCarousel({
		// center: true,
		items: 1,
		loop: true,
		margin: 30,
		autoplay: true,
		autoplayTimeout: 2000,
		autoplayHoverPause: true,
		dots: true,
		nav: true,
		navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
		responsive:{
			0:{
				items: 1,
			},
			600:{
				items: 2,
			},
			1000:{
				items: 3,
			}
		}
	});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/guest/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/front/home.blade.php ENDPATH**/ ?>