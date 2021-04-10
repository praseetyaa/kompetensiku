
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
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/member/profil" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profil</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/member/rekening" aria-expanded="false"><i class="mdi mdi-credit-card"></i><span class="hide-menu">Rekening Anda</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/member/komisi" aria-expanded="false"><i class="mdi mdi-credit-card-scan"></i><span class="hide-menu">Komisi</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/member/produk" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">Produk</span></a></li>
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
        <!-- ============================================================== --><?php /**PATH C:\xampp\htdocs\campusdigital\resources\views/template/member/_sidebar.blade.php ENDPATH**/ ?>