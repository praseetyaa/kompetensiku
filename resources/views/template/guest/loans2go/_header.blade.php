	<!-- Header Section -->
	<nav class="navbar navbar-expand-lg container navbar-light">
		<a class="navbar-brand" href="/{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">
			<img src="{{ asset('assets/images/logo/'.get_logo()) }}" height="75" alt="">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
				<li class="nav-item {{ Request::path() == '/' ? 'active' : '' }}">
					<a class="nav-link" href="/{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">Home</a>
				</li>
				<li class="nav-item {{ strpos(Request::url(), '/beasiswa') ? 'active' : '' }}">
					<a class="nav-link" href="/beasiswa{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">Beasiswa</a>
				</li>
				<li class="nav-item {{ strpos(Request::url(), '/afiliasi') ? 'active' : '' }}">
					<a class="nav-link" href="/afiliasi{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">Afiliasi</a>
				</li>
				<li class="nav-item {{ strpos(Request::url(), '/artikel') ? 'active' : '' }}">
					<a class="nav-link" href="/artikel{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">Artikel</a>
				</li>
				<li class="nav-item {{ strpos(Request::url(), '/tentang-kami') ? 'active' : '' }}">
					<a class="nav-link" href="/tentang-kami{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">Tentang Kami</a>
				</li>
				<li class="nav-item d-lg-none">
					<a class="nav-link" href="/login{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">Login</a>
				</li>
				<li class="nav-item d-lg-none {{ strpos(Request::url(), '/register') ? 'active' : '' }}">
					<a class="nav-link" href="/register{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">Daftar</a>
				</li>
			</ul>
			<a class="btn btn-navbar btn-login d-lg-inline-block d-none" href="/login{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">Login</a>
			<a class="btn btn-navbar btn-register d-lg-inline-block d-none" href="/register{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">Daftar</a>
		</div>
	</nav>
	<!-- Header Section end -->