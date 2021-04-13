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
        <i class="fas fa-user color-theme-1"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-end megamenu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="w-100 me-2 mt-3 mt-lg-0">
      <div class="input-group">
        <input type="text" class="form-control border-end-0" placeholder="Pencarian">
        <button class="input-group-text bg-transparent border-start-0"><i class="fas fa-search color-theme-1"></i></button>
      </div>
    </form>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Program</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Acara</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Artikel</a>
        </li>
        <li class="nav-item">
          @if(Auth::guest())
            <a class="nav-link btn btn-theme-1 btn-sm px-3 ms-2 rounded-3" href="/login">Masuk&nbsp;|&nbsp;Daftar</a>
          @endif
        </li>
      </ul>
    </div>
  </div>
</nav>