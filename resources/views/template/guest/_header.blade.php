<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container py-lg-2">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ URL::to('/') }}{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">
      <img src="{{ asset('assets/images/logo/'.get_logo()) }}" width="170" alt="logo">
    </a>
    <div class="nav-item dropdown dropdown-mobile d-block d-lg-none megamenu-li">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ Auth::user()->foto != '' ? asset('assets/images/users/'.Auth::user()->foto) : asset('assets/images/default/user.jpg') }}" alt="user" class="rounded-circle" width="30">
      </a>
      <ul class="dropdown-menu dropdown-menu-end megamenu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="{{Auth::user()->is_admin==1? '/admin' : '/member'}}">Dashboard</a></li>
        <li><a class="dropdown-item" href="{{Auth::user()->is_admin==1? '/admin/profil' : '/member/profil'}}">Profil</a></li>
        @if(Auth::user()->is_admin==0)
        <li><a class="dropdown-item" href="/member/afiliasi/cara-jualan">Afiliasi</a></li>
        @endif
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Keluar</a></li>
        <form id="form-logout" method="post" action="{{Auth::user()->is_admin==1? '/admin/logout' : '/member/logout'}}">
              {{ csrf_field() }}
        </form>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="w-100 me-2 mt-3 mt-lg-0">
      <div class="input-group search-bar">
        <input type="text" class="form-control border-end-0" placeholder="Pencarian">
        <button class="input-group-text bg-transparent border-start-0"><i class="fas fa-search color-theme-1"></i></button>
      </div>
    </form>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="/">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/program">Program</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/acara">Acara</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/artikel">Artikel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/tentang-kami">Tentang&nbsp;Kami</a>
        </li>
        @if(Auth::guest())
        <li class="nav-item">
            <a class="nav-link btn btn-theme-1 btn-sm px-3 ms-2 rounded-3" href="/login">Masuk&nbsp;|&nbsp;Daftar</a>
        </li>
        @else
        <li class="nav-item dropdown dropdown-mobile d-none d-lg-block">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ Auth::user()->foto != '' ? asset('assets/images/users/'.Auth::user()->foto) : asset('assets/images/default/user.jpg') }}" alt="user" class="rounded-circle" width="25">
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{Auth::user()->is_admin==1? '/admin' : '/member'}}">Dashboard</a></li>
            <li><a class="dropdown-item" href="{{Auth::user()->is_admin==1? '/admin/profil' : '/member/profil'}}">Profil</a></li>
            @if(Auth::user()->is_admin==0)
            <li><a class="dropdown-item" href="/member/afiliasi/cara-jualan">Afiliasi</a></li>
            @endif
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Keluar</a></li>
            <form id="form-logout" method="post" action="{{Auth::user()->is_admin==1? '/admin/logout' : '/member/logout'}}">
                  {{ csrf_field() }}
            </form>
          </ul>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>