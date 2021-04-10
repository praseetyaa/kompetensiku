	<!-- Header Section -->
	<nav class="navbar navbar-expand-lg container navbar-light">
		<a class="navbar-brand" href="/<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">
			<img src="<?php echo e(asset('assets/images/logo/'.get_logo())); ?>" height="75" alt="">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
				<li class="nav-item <?php echo e(Request::path() == '/' ? 'active' : ''); ?>">
					<a class="nav-link" href="/<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Home</a>
				</li>
				<li class="nav-item <?php echo e(strpos(Request::url(), '/beasiswa') ? 'active' : ''); ?>">
					<a class="nav-link" href="/beasiswa<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Beasiswa</a>
				</li>
				<li class="nav-item <?php echo e(strpos(Request::url(), '/afiliasi') ? 'active' : ''); ?>">
					<a class="nav-link" href="/afiliasi<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Afiliasi</a>
				</li>
				<li class="nav-item <?php echo e(strpos(Request::url(), '/artikel') ? 'active' : ''); ?>">
					<a class="nav-link" href="/artikel<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Artikel</a>
				</li>
				<li class="nav-item <?php echo e(strpos(Request::url(), '/tentang-kami') ? 'active' : ''); ?>">
					<a class="nav-link" href="/tentang-kami<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Tentang Kami</a>
				</li>
				<li class="nav-item d-lg-none">
					<a class="nav-link" href="/login<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Login</a>
				</li>
				<li class="nav-item d-lg-none <?php echo e(strpos(Request::url(), '/register') ? 'active' : ''); ?>">
					<a class="nav-link" href="/register<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Daftar</a>
				</li>
			</ul>
			<a class="btn btn-navbar btn-login d-lg-inline-block d-none" href="/login<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Login</a>
			<a class="btn btn-navbar btn-register d-lg-inline-block d-none" href="/register<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Daftar</a>
		</div>
	</nav>
	<!-- Header Section end --><?php /**PATH C:\xampp\htdocs\lms-v2\resources\views/template/guest/_header.blade.php ENDPATH**/ ?>