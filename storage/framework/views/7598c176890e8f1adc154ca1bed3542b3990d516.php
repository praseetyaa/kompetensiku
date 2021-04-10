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
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section" style="background-color: #eeeeee!important">
	<div class="container">
		<div class="row justify-content-center pb-5 mb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<h2>Apa saja yang bisa kami bantu?</h2>
				<span class="subheading">Layanan Kami</span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 d-flex services align-self-stretch px-4 mb-4 ftco-animate">
				<div class="d-block text-center">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-goal"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">Career &amp; Business</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>      
			</div>
			<div class="col-md-4 d-flex services align-self-stretch px-4 mb-4 ftco-animate">
				<div class="d-block text-center">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-stress"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">Mental &amp; Physical Care</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>    
			</div>
			<div class="col-md-4 d-flex services align-self-stretch px-4 mb-4 ftco-animate">
				<div class="d-block text-center">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-crm"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">People &amp; Relationships</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>      
			</div>
			<div class="col-md-4 d-flex services align-self-stretch px-4 mb-4 ftco-animate">
				<div class="d-block text-center">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-marriage"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">Life coaching</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>      
			</div>
		</div>
	</div>
</section>

<section class="ftco-section testimony-section bg-secondary">
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
					<div class="item">
						<div class="testimony-wrap py-4">
							<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
							<div class="text">
								<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<div class="d-flex align-items-center">
								<div class="user-img" style="background-image: url(<?php echo e(asset('templates/lifecoach/images/person_1.jpg')); ?>)"></div>
									<div class="pl-3">
										<p class="name">Roger Scott</p>
										<span class="position">Marketing Manager</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap py-4">
							<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
							<div class="text">
								<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<div class="d-flex align-items-center">
									<div class="user-img" style="background-image: url(<?php echo e(asset('templates/lifecoach/images/person_2.jpg')); ?>)"></div>
									<div class="pl-3">
										<p class="name">Roger Scott</p>
										<span class="position">Marketing Manager</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap py-4">
							<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
							<div class="text">
								<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<div class="d-flex align-items-center">
									<div class="user-img" style="background-image: url(<?php echo e(asset('templates/lifecoach/images/person_3.jpg')); ?>)"></div>
									<div class="pl-3">
										<p class="name">Roger Scott</p>
										<span class="position">Marketing Manager</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap py-4">
							<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
							<div class="text">
								<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<div class="d-flex align-items-center">
									<div class="user-img" style="background-image: url(<?php echo e(asset('templates/lifecoach/images/person_1.jpg')); ?>)"></div>
									<div class="pl-3">
										<p class="name">Roger Scott</p>
										<span class="position">Marketing Manager</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap py-4">
							<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
							<div class="text">
								<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<div class="d-flex align-items-center">
									<div class="user-img" style="background-image: url(<?php echo e(asset('templates/lifecoach/images/person_2.jpg')); ?>)"></div>
									<div class="pl-3">
										<p class="name">Roger Scott</p>
										<span class="position">Marketing Manager</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>

	<section class="ftco-section bg-light">
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
				<a href="/artikel/<?php echo e($data->blog_permalink); ?>" class="block-20 rounded" style="background-image: url(<?php echo e(asset('assets/images/blog/'.$data->blog_gambar)); ?>);">
				</a>
				<div class="text mt-3">
					<div class="meta mb-2">
					<div><a href="#" class="meta-chat"><span class="fa fa-calendar"></span> <?php echo e(generate_date($data->blog_at)); ?></a></div>
					<div><a href="#" class="meta-chat"><span class="fa fa-user"></span> <?php echo e($data->nama_user); ?></a></div>
					<div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 0</a></div>
					</div>
					<h3 class="heading"><a href="#"><?php echo e($data->blog_title); ?></a></h3>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/guest/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/index.blade.php ENDPATH**/ ?>