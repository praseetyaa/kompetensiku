
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
                        <!-- <li class="sidebar-item <?php echo e(strpos(Request::url(), '/member/profil') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/profil') ? 'active' : ''); ?>" href="/member/profil" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profil</span></a></li> -->
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/member/transaksi') || strpos(Request::url(), '/member/rekening') || strpos(Request::url(), '/member/afiliasi') ? 'selected' : ''); ?>"> <a class="sidebar-link has-arrow waves-effect waves-dark <?php echo e(strpos(Request::url(), '/member/transaksi') || strpos(Request::url(), '/member/rekening') || strpos(Request::url(), '/member/afiliasi') ? 'active' : ''); ?>" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-credit-card-scan"></i><span class="hide-menu">Afiliasi</span></a>
                            <ul aria-expanded="false" class="collapse first-level <?php echo e(strpos(Request::url(), '/member/transaksi') || strpos(Request::url(), '/member/rekening') || strpos(Request::url(), '/member/afiliasi') ? 'in' : ''); ?>">
                                <li class="sidebar-item <?php echo e(strpos(Request::url(), '/member/rekening') ? 'active' : ''); ?>"><a href="/member/rekening" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu">Rekening Anda</span></a></li>
                                <li class="sidebar-item <?php echo e(strpos(Request::url(), '/member/afiliasi/cara-jualan') ? 'active' : ''); ?>"><a href="/member/afiliasi/cara-jualan" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu">Cara Jualan</span></a></li>
                                <li class="sidebar-item <?php echo e(strpos(Request::url(), '/member/transaksi/komisi') ? 'active' : ''); ?>"><a href="/member/transaksi/komisi" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu">Komisi</span></a></li>
                                <li class="sidebar-item <?php echo e(strpos(Request::url(), '/member/transaksi/withdrawal') ? 'active' : ''); ?>"><a href="/member/transaksi/withdrawal" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu">Withdrawal</span></a></li>
                                <li class="sidebar-item <?php echo e(strpos(Request::url(), '/member/transaksi/pelatihan') ? 'active' : ''); ?>"><a href="/member/transaksi/pelatihan" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu">Pelatihan</span></a></li>
                            </ul>
                        </li>
                        <?php $__currentLoopData = $kategori_materi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/member/materi/'.strtolower($kategori->kategori)) ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/member/materi/'.strtolower($kategori->kategori)) ? 'active' : ''); ?>" href="/member/materi/<?php echo e(strtolower($kategori->kategori)); ?>" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">Materi <?php echo e($kategori->kategori); ?></span></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/member/e-course') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/member/e-course') ? 'active' : ''); ?>" href="/member/e-course" aria-expanded="false"><i class="mdi mdi-video"></i><span class="hide-menu">Materi E-Course</span></a></li>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/member/script') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/member/script') ? 'active' : ''); ?>" href="/member/script" aria-expanded="false"><i class="mdi mdi-text-shadow"></i><span class="hide-menu">Kumpulan Copywriting</span></a></li>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/member/tools') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/member/tools') ? 'active' : ''); ?>" href="/member/tools" aria-expanded="false"><i class="mdi mdi-briefcase"></i><span class="hide-menu">Kumpulan Tools</span></a></li>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/member/pelatihan') ? 'selected' : ''); ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo e(strpos(Request::url(), '/member/pelatihan') ? 'active' : ''); ?>" href="/member/pelatihan" aria-expanded="false"><i class="mdi mdi-school"></i><span class="hide-menu">Pelatihan</span></a></li>
                        <li class="sidebar-item <?php echo e(strpos(Request::url(), '/member/e-sertifikat') ? 'selected' : ''); ?>"> <a class="sidebar-link has-arrow waves-effect waves-dark <?php echo e(strpos(Request::url(), '/member/e-sertifikat') ? 'active' : ''); ?>" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-certificate"></i><span class="hide-menu">Arsip E-Sertifikat</span></a>
                            <ul aria-expanded="false" class="collapse first-level <?php echo e(strpos(Request::url(), '/admin/e-sertifikat') ? 'in' : ''); ?>">
                                <li class="sidebar-item <?php echo e(strpos(Request::url(), '/member/e-sertifikat/trainer') ? 'active' : ''); ?>"><a href="/member/e-sertifikat/trainer" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu">Trainer</span></a></li>
                                <li class="sidebar-item <?php echo e(strpos(Request::url(), '/member/e-sertifikat/peserta') ? 'active' : ''); ?>"><a href="/member/e-sertifikat/peserta" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu">Peserta</span></a></li>
                            </ul>
                        </li>
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
        <!-- ============================================================== --><?php /**PATH /var/www/vhosts/campusdigital.id/public_html/laravel-v3/resources/views/template/member/_sidebar.blade.php ENDPATH**/ ?>