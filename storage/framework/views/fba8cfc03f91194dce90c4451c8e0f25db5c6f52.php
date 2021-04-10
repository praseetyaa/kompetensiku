
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/member" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
						<?php if(Auth::user()->status == 1): ?>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/profil') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/profil') ? 'active' : ''); ?>" href="/member/profil" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profil</span></a></li>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/rekening') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/rekening') ? 'active' : ''); ?>" href="/member/rekening" aria-expanded="false"><i class="mdi mdi-credit-card"></i><span class="hide-menu">Rekening Anda</span></a></li>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/komisi') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/komisi') ? 'active' : ''); ?>" href="/member/komisi" aria-expanded="false"><i class="mdi mdi-credit-card-scan"></i><span class="hide-menu">Komisi</span></a></li>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/e-book') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/e-book') ? 'active' : ''); ?>" href="/member/e-book" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">Materi E-Book</span></a></li>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/e-library') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/e-library') ? 'active' : ''); ?>" href="/member/e-library" aria-expanded="false"><i class="mdi mdi-library-books"></i><span class="hide-menu">Materi E-Library</span></a></li>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/e-competence') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/e-competence') ? 'active' : ''); ?>" href="/member/e-competence" aria-expanded="false"><i class="mdi mdi-book-variant"></i><span class="hide-menu">Materi E-Competence</span></a></li>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/e-course') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/e-course') ? 'active' : ''); ?>" href="/member/e-course" aria-expanded="false"><i class="mdi mdi-video"></i><span class="hide-menu">Materi E-Course</span></a></li>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/pelatihan') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/pelatihan') ? 'active' : ''); ?>" href="/member/pelatihan" aria-expanded="false"><i class="mdi mdi-school"></i><span class="hide-menu">Pelatihan</span></a></li>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/e-sertifikat') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/e-sertifikat') ? 'active' : ''); ?>" href="/member/e-sertifikat" aria-expanded="false"><i class="mdi mdi-certificate"></i><span class="hide-menu">E-Sertifikat</span></a></li>
						<?php endif; ?>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('form-logout').submit();" aria-expanded="false"><i class="mdi mdi-power"></i><span class="hide-menu">Logout</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== --><?php /**PATH /var/www/vhosts/psikologanda.com/laravel-akademi/resources/views/template/member/_sidebar.blade.php ENDPATH**/ ?>