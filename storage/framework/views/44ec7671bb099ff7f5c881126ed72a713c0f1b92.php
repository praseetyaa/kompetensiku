
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
						<!--
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/profil" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profil</span></a></li>
						-->
                        <?php if(Auth::user()->role == 1 || Auth::user()->role == 2): ?>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/user" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">User</span></a></li>
                        <?php endif; ?>
                        <?php if(Auth::user()->role == 1): ?>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/role" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Role</span></a></li>
                        <?php endif; ?>
                        <?php if(Auth::user()->role == 1 || Auth::user()->role == 2): ?>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/platform" aria-expanded="false"><i class="mdi mdi-credit-card"></i><span class="hide-menu">Platform Pembayaran</span></a></li>
                        <?php endif; ?>
                        <?php if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 4): ?>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/rekening" aria-expanded="false"><i class="mdi mdi-credit-card-multiple"></i><span class="hide-menu">Rekening</span></a></li>
                        <?php endif; ?>
                        <?php if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 4): ?>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/komisi" aria-expanded="false"><i class="mdi mdi-credit-card-scan"></i><span class="hide-menu">Komisi</span></a></li>
                        <?php endif; ?>
                        <?php if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 4): ?>
                        <!--<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/request" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Request</span></a></li>-->
                        <?php endif; ?>
                        <?php if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3): ?>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/blog" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Artikel</span></a></li>
                        <?php endif; ?>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/email" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">E-Mail</span></a></li>
                        <?php if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3): ?>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), 'e-book') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), 'e-book') ? 'active' : ''); ?>" href="/admin/e-book" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">Materi E-Book</span></a></li>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/e-library') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/e-library') ? 'active' : ''); ?>" href="/admin/e-library" aria-expanded="false"><i class="mdi mdi-library-books"></i><span class="hide-menu">Materi E-Library</span></a></li>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/e-competence') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/e-competence') ? 'active' : ''); ?>" href="/admin/e-competence" aria-expanded="false"><i class="mdi mdi-book-variant"></i><span class="hide-menu">Materi E-Competence</span></a></li>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/e-course') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/e-course') ? 'active' : ''); ?>" href="/admin/e-course" aria-expanded="false"><i class="mdi mdi-video"></i><span class="hide-menu">Materi E-Course</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/pelatihan" aria-expanded="false"><i class="mdi mdi-school"></i><span class="hide-menu">Pelatihan</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/e-sertifikat" aria-expanded="false"><i class="mdi mdi-certificate"></i><span class="hide-menu">E-Sertifikat</span></a></li>
                        <?php endif; ?>
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/galeri" aria-expanded="false"><i class="mdi mdi-image"></i><span class="hide-menu">Galeri</span></a></li> -->
                        <?php if(Auth::user()->role == 1 || Auth::user()->role == 2): ?>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/pengaturan" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">Pengaturan</span></a></li>
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
        <!-- ============================================================== --><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-campusdigital/resources/views/template/admin/_sidebar.blade.php ENDPATH**/ ?>