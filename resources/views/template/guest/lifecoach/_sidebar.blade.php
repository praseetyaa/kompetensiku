
        <nav id="sidebar" class="sidebar-wrapper">
            <div id="dismiss"> <i class="fa fa-arrow-left"></i> </div>
            <ul class="list-unstyled sidebar-menu">
                <li class="menu-label"> <a href="/">Home</a> </li>
                <li class="menu-label sidebar-dropdown"> <a href="#"> <span>Program</span> <i class="drop-icon" data-feather="chevron-right"></i> </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li class="menu-link"> <a href="{{ Request::path() == '/' ? '#online-class' : '/online-class' }}">Online Class</a> </li>
                            <li class="menu-link"> <a href="{{ Request::path() == '/' ? '#online-course' : '/online-course' }}">Online Course</a> </li>
                            <li class="menu-link"> <a href="{{ Request::path() == '/' ? '#workshop' : '/workshop' }}">Workshop</a> </li>
                            <li class="menu-link"> <a href="{{ Request::path() == '/' ? '#sertifikasi' : '/sertifikasi' }}">Sertifikasi</a> </li>
                        </ul>
                    </div>
                </li>
                <li class="menu-label"> <a href="https://karir.psikologanda.com" target="_blank">Psikolog</a> </li>
                <li class="menu-label"> <a href="{{ Request::path() == '/' ? '#career' : '/karir' }}">Karir</a> </li>
                <li class="menu-label"> <a href="https://tes.psikologanda.com" target="_blank">Tes Online</a> </li>
                <li class="menu-label"> <a href="/login">Masuk</a> </li>
                <li class="menu-label"> <a href="/register">Daftar</a> </li>
            </ul>
        </nav>