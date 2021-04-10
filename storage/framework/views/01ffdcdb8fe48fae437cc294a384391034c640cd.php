

<?php $__env->startSection('title', 'Kategori: '.$kategori->kategori.' | '); ?>

<?php $__env->startSection('content'); ?>

<!-- bradcam_area_start -->
 <div class="bradcam_area breadcam_bg overlay" style="background-image: url('<?php echo e(asset('assets/images/others/slider-1.jpg')); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Kategori</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end -->

	<!-- Start Sample Area -->
	<section class="sample-text-area">
		<div class="container box_1170">
			<h3 class="text-heading"><?php echo e($kategori->kategori); ?></h3>
            <div class="row">
                <?php $__currentLoopData = $artikel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <a href="/artikel/<?php echo e($data->blog_permalink); ?>">
                                <img class="card-img rounded-0" src="<?php echo e($data->blog_gambar != '' ? asset('assets/images/blog/'.$data->blog_gambar) : asset('assets/images/default/artikel.jpg')); ?>" alt="">
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="/artikel/<?php echo e($data->blog_permalink); ?>">
                                <h2><?php echo e($data->blog_title); ?></h2>
                            </a>
                            <ul class="blog-info-link">
                                <li><i class="fa fa-calendar"></i> <?php echo e(date('d/m/Y', strtotime($data->blog_at))); ?></li>
                                <li><i class="fa fa-user"></i> <?php echo e($data->nama_user); ?></li>
                                <li><i class="fa fa-comments"></i> <?php echo e(count_comments($data->id_blog)); ?></li>
                            </ul>
                        </div>
                    </article>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <nav class="blog-pagination justify-content-center d-flex">
                <?php echo $artikel->links(); ?>

            </nav>
		</div>
	</section>
	<!-- End Sample Area -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/guest/br/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/bisa.co.id/public_html/bisa-v2/resources/views/front/br/category.blade.php ENDPATH**/ ?>