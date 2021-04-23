<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <a class="navbar-brand" href="/" target="_blank">
                <b class="logo-icon p-l-10">
                    <img src="{{ asset('assets/images/logo/'.get_icon()) }}" height="30" alt="homepage" class="light-logo" />
                   
                </b>
                <span class="logo-text ml-2">
                     Admin Area
                </span>
            </a>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
            </ul>
<!--                     <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-transparent border-right-0" id="basic-addon1" style="border-radius: 1.5em 0 0 1.5em"><i class="ti-search font-weight-bold"></i></span>
              </div>
              <input type="text" class="form-control border-left-0" placeholder="Pencarian" aria-label="Pencarian" aria-describedby="basic-addon1" style="border-radius: 0 1.5em 1.5em 0">
            </div> -->
            <ul class="navbar-nav float-right">
                @if(Auth::user()->role == role_it())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="font-24 mdi mdi-chart-arc"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated fadeIn shadow p-0">
                        <div class="card m-0">
                            <div class="card-header">
                                <span class="font-weight-bold">Statistik</span>
                            </div>
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <a href="/admin/statistik/visitor" class="dropdown-item">
                                            <span class="btn btn-success btn-circle mb-2"><i class="ti-pie-chart"></i></span>
                                            <p class="m-0">Visitor</p>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="/admin/statistik/top-visitor" class="dropdown-item">
                                            <span class="btn btn-danger btn-circle mb-2"><i class="ti-bar-chart"></i></span>
                                            <p class="m-0">Top Visitor</p>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="/admin/statistik/file-reader" class="dropdown-item">
                                            <span class="btn btn-warning btn-circle mb-2"><i class="ti-book"></i></span>
                                            <p class="m-0">Pembaca<br>Materi</p>
                                        </a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="font-24 mdi mdi-bell"></i>
						@if($global_total > 0) <span class="badge badge-danger" style="font-size: 10px">{{ $global_total }}</span> @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated fadeIn shadow p-0" aria-labelledby="2">
                        <div class="card m-0">
                            <div class="card-header">
                                <span class="font-weight-bold">Notifikasi</span>
                            </div>
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <a href="/admin/transaksi/komisi" class="dropdown-item">
                                            <span class="btn btn-success btn-circle mb-2"><i class="ti-money"></i>
                                                @if($global_komisi_total > 0)
                                                <span class="badge badge-pill badge-danger" style="position: absolute; top: 0">{{ $global_komisi_total }}</span>
                                                @endif
                                            </span>
                                            <p class="m-0">Verifikasi<br>Komisi</p>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="/admin/transaksi/withdrawal" class="dropdown-item">
                                            <span class="btn btn-danger btn-circle mb-2"><i class="ti-money"></i>
                                                @if($global_withdrawal_total > 0)
                                                    <span class="badge badge-pill badge-danger" style="position: absolute; top: 0">{{ $global_withdrawal_total }}</span>
                                                @endif
                                            </span>
                                            <p class="m-0">Pengambilan<br>Komisi</p>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="/admin/transaksi/pelatihan" class="dropdown-item">
                                            <span class="btn btn-warning btn-circle mb-2"><i class="ti-money"></i>
                                                @if($global_pelatihan_member_total > 0)
                                                    <span class="badge badge-pill badge-danger" style="position: absolute; top: 0">{{ $global_pelatihan_member_total }}</span>
                                                @endif
                                            </span>
                                            <p class="m-0">Pembayaran<br>Pelatihan</p>
                                        </a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="font-24 mdi mdi-account-circle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated fadeIn p-0">
                        <div class="card m-0">
                            <div class="card-header d-flex align-items-center">
                                <img src="{{ Auth::user()->foto != '' ? asset('assets/images/users/'.Auth::user()->foto) : asset('assets/images/default/user.jpg') }}" alt="user" class="rounded-1 flex-shrink-0 mr-3" width="40">
                                <div class="flex-grow-1">
                                    <p class="m-0">Hai, <strong>{{ Auth::user()->nama_user }}</strong></p>
                                    <p class="m-0">{{ get_role_name(Auth::user()->role) }}</p>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-6">
                                        <a class="dropdown-item text-center py-4" href="/" target="_blank">
                                            <span class="btn btn-success btn-circle mb-2"><i class="ti-home"></i></span>
                                            <p class="m-0">Beranda</p>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a class="dropdown-item text-center py-4" href="/admin/profil">
                                            <span class="btn btn-warning btn-circle mb-2"><i class="ti-user"></i></span>
                                            <p class="m-0">Profil</p>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        @if(Auth::user()->role == role_manajer() || Auth::user()->role == role_mentor())
                                        <a class="dropdown-item text-center py-4" href="/admin/e-signature">
                                            <span class="btn btn-warning btn-circle mb-2"><i class="ti-pencil"></i></span>
                                            <p class="m-0">E-Signature</p>
                                        </a>
                                        @endif   
                                    </div>
                                    <div class="col-6">
                                        <a class="dropdown-item text-center py-4" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">
                                            <span class="btn btn-danger btn-circle mb-2"><i class="ti-power-off"></i></span>
                                            <p class="m-0">Keluar</p>
                                        </a>
                                        <form id="form-logout" method="post" action="/admin/logout">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>