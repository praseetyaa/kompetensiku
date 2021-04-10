
<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3">
                        <div class="logo-img">
                            <a href="<?php echo e(URL::to('/')); ?><?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">
                                <img src="<?php echo e(asset('assets/images/logo/'.get_logo())); ?>" height="50" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9">
                        <div class="menu_wrap d-none d-lg-block">
                            <div class="menu_wrap_inner d-flex align-items-center justify-content-end">
                                <div class="main-menu">
                                    <nav>
                                        <ul id="navigation">
                                            <?php $__currentLoopData = generate_menu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($menu['url'] == '/'): ?>
                                                    <li><a class="<?php echo e(Request::path() == '/' ? 'active' : ''); ?>" href="<?php echo e(URL::to('/')); ?><?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>"><?php echo e($menu['name']); ?></a></li>
                                                <?php else: ?>
						                            <?php if(count(array_filter($menu['children'])) > 0): ?>
                                                        <li><a href="#"><?php echo e($menu['name']); ?> <i class="ti-angle-down"></i></a>
                                                            <ul class="submenu">
								                                <?php $__currentLoopData = $menu['children'][0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><a href="<?php echo e(URL::to($children['url'])); ?><?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>"><?php echo e($children['name']); ?></a></li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        </li>
                                                    <?php else: ?>
                                                        <li><a href="<?php echo e(URL::to($menu['url'])); ?><?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>"><?php echo e($menu['name']); ?></a></li>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!Auth::guest()): ?>
                                                <li><a href="#"><img src="<?php echo e(Auth::user()->foto != '' ? asset('assets/images/users/'.Auth::user()->foto) : asset('assets/images/default/user.jpg')); ?>" height="40"></a>
                                                    <ul class="submenu">
                                                        <li><a href="<?php echo e(Auth::user()->is_admin == 1 ? '/admin' : '/member'); ?>">Dashboard</a></li>
                                                        <li><a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Logout</a></li>
                                                        <form id="form-logout" class="d-none" method="post" action="<?php echo e(Auth::user()->is_admin == 1 ? '/admin/logout' : '/member/logout'); ?>">
                                                            <?php echo e(csrf_field()); ?>

                                                        </form>
                                                    </ul>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </nav>
                                </div>
                                <?php if(Auth::guest()): ?>
                                <div class="book_room">
                                    <div class="book_btn" style="margin-right: 25px;">
                                        <a class="" href="/login">Login</a>
                                    </div>
                                    <div class="book_btn">
                                        <a class="" href="/register<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Daftar</a>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-end --><?php /**PATH C:\xampp\htdocs\lms-v2\resources\views/template/guest/br/_header.blade.php ENDPATH**/ ?>