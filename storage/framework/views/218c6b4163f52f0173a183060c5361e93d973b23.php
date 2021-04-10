

	<!-- Header Section -->
	<header class="header-section">
		<a href="/<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>" class="site-logo">
			<img src="<?php echo e(asset('assets/images/logo/logo-white.png')); ?>" height="60" alt="">
		</a>
		<nav class="header-nav">
			<ul class="main-menu">
				<li><a href="/<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Home</a></li>
				<li><a href="/beasiswa<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Beasiswa</a></li>
				<li><a href="/afiliasi<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Afiliasi</a></li>
				<!-- <li><a href="/blog<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Blog</a></li> -->
				<li><a href="/tentang-kami<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Tentang Kami</a></li>
			</ul>
			<div class="header-right">
				<a href="/login<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>" class="hr-btn">Login</a>
				<a href="/register<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>" class="hr-btn hr-btn-2">Daftar</a>
			</div>
		</nav>
	</header>
	<!-- Header Section end --><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-referral/resources/views/template/guest/_header.blade.php ENDPATH**/ ?>