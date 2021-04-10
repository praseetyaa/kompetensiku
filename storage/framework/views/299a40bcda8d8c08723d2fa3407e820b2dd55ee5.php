
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="/"><img src="<?php echo e(asset('assets/images/logo/'.get_logo())); ?>" height="50"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
				<?php $__currentLoopData = generate_menu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($menu['url'] == '/'): ?>
					<li class="nav-item <?php echo e(Request::path() == '/' ? 'active' : ''); ?>" style="background-color: <?php echo e($menu['bgcolor']); ?>;">
						<a href="<?php echo e(URL::to('/')); ?><?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>" class="nav-link" style="color: <?php echo e($menu['color']); ?>;"><?php echo e($menu['name']); ?></a>
					</li>
					<?php else: ?>
						<?php if(count(array_filter($menu['children'])) > 0): ?>
						<li class="nav-item dropdown" style="background-color: <?php echo e($menu['bgcolor']); ?>;">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-<?php echo e($key); ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: <?php echo e($menu['color']); ?>;">
							<?php echo e($menu['name']); ?>

							</a>
							<div class="dropdown-menu shadow" aria-labelledby="navbarDropdown-<?php echo e($key); ?>">
								<?php $__currentLoopData = $menu['children'][0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<a class="dropdown-item" href="<?php echo e(URL::to($children['url'])); ?><?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>"><?php echo e($children['name']); ?></a>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</li>
						<?php else: ?>
							<li class="nav-item	<?php echo e(strpos(Request::url(), $menu['url']) ? 'active' : ''); ?>" style="background-color: <?php echo e($menu['bgcolor']); ?>;">
								<a href="<?php echo e(URL::to($menu['url'])); ?><?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>" class="nav-link" style="color: <?php echo e($menu['color']); ?>;"><?php echo e($menu['name']); ?></a>
							</li>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php if(!Auth::guest()): ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #eeeeee;">
							<img src="<?php echo e(Auth::user()->foto != '' ? asset('assets/images/users/'.Auth::user()->foto) : asset('assets/images/default/user.jpg')); ?>" height="40">
						</a>
						<div class="dropdown-menu shadow" aria-labelledby="navbarDropdownUser">
							<a class="dropdown-item" href="<?php echo e(Auth::user()->is_admin == 1 ? '/admin' : '/member'); ?>">Dashboard</a>
							<a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Logout</a>
							<form id="form-logout" class="d-none" method="post" action="<?php echo e(Auth::user()->is_admin == 1 ? '/admin/logout' : '/member/logout'); ?>">
								<?php echo e(csrf_field()); ?>

							</form>
						</div>
					</li>
				<?php else: ?>
					<li class="nav-item	<?php echo e(strpos(Request::url(), '/login') ? 'active' : ''); ?>" style="background-color: #fdd100;">
						<a href="/login<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>" class="nav-link" style="color: generate_color('#fdd100');">Login</a>
					</li>
					<li class="nav-item	<?php echo e(strpos(Request::url(), '/register') ? 'active' : ''); ?>" style="background-color: #ff9800;">
						<a href="/register<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>" class="nav-link" style="color: <?php echo e(generate_color('#ff9800')); ?>;">Daftar</a>
					</li>
				<?php endif; ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav --><?php /**PATH C:\xampp\htdocs\lms\resources\views/template/guest/_header.blade.php ENDPATH**/ ?>