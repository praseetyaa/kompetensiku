<footer class="footer">
	<div class="container px-lg-5">
		<div class="row">
			<div class="col-md-4 pt-5">
				<img src="<?php echo e(asset('assets/images/logo/'.get_logo())); ?>" class="img-fluid px-4">
			</div>
			<div class="col-md-8 pt-5">
				<div class="row">
					<div class="col-md-4">
						<h2 class="footer-heading">Menu</h2>
						<ul class="list-unstyled">
							<?php $__currentLoopData = $global_halaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $halaman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><a href="/page/<?php echo e($halaman->halaman_permalink); ?><?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>" class="py-1 d-block"><?php echo e($halaman->halaman_title); ?></a></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
					<div class="col-md-4">
						<h2 class="footer-heading">Kategori</h2>
						<ul class="list-unstyled">
							<?php $__currentLoopData = $global_kategori_artikel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori_artikel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><a href="/kategori/<?php echo e($kategori_artikel->slug); ?><?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>" class="py-1 d-block"><?php echo e($kategori_artikel->kategori); ?></a></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
					<!-- <div class="col-md-12 mb-md-0 text-center" style="margin-top: 3rem;">
						<p class="text-white mb-0"><i class="fa fa-map-marker position-absolute" style="font-size: 22px;"></i><span style="margin-left: 1.75rem!important;"><?php echo e(get_alamat()); ?></span></p>
						<ul class="footer-profile">
							<li></li>
							<li><i class="fa fa-envelope position-absolute" style="font-size: 22px;"></i><span><?php echo e(get_email()); ?></span></li>
							<li><i class="fa fa-phone position-absolute" style="font-size: 22px;"></i><span><?php echo e(get_nomor_telepon()); ?></span></li>
							<li><i class="fab fa-whatsapp position-absolute" style="font-size: 22px;"></i><span><?php echo e(get_nomor_whatsapp()); ?></span></li>
							<?php if(get_akun_facebook() != ''): ?><li><i class="fab fa-facebook position-absolute" style="font-size: 22px;"></i><span><?php echo e(get_akun_facebook()); ?></span></li><?php endif; ?>
							<?php if(get_akun_instagram() != ''): ?><li><i class="fab fa-instagram position-absolute" style="font-size: 22px;"></i><span><?php echo e(get_akun_instagram()); ?></span></li><?php endif; ?>
							<?php if(get_akun_twitter() != ''): ?><li><i class="fab fa-twitter position-absolute" style="font-size: 22px;"></i><span><?php echo e(get_akun_twitter()); ?></span></li><?php endif; ?>
						</ul>
					</div> -->
				</div>
			</div>
			<div class="col-md-12 pt-5">
				<div class="row mt-md-5">
					<div class="col-md-12 text-center">
						<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> <strong><?php echo e(get_website_name()); ?></strong>. All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<!-- WhatsApp Button -->
<div style="bottom:25px; position:fixed; right:10px; z-index:999; border:#000000 0px solid;">
	<a href="#" onClick="window.open('https://api.whatsapp.com/send?phone=<?php echo e(get_nomor_whatsapp()); ?>', '_blank')">
		<img src=" <?php echo e(asset('assets/images/others/chat-wa.png')); ?>" class="img-responsive" style="max-width: 200px;">
	</a>
</div>
<!-- WhatsApp Button End --><?php /**PATH C:\xampp\htdocs\lms\resources\views/template/guest/_footer.blade.php ENDPATH**/ ?>