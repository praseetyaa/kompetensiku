
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="/"><img src="{{ asset('assets/images/logo/'.get_logo()) }}" height="50"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
				@foreach(generate_menu() as $key=>$menu)
					@if($menu['url'] == '/')
					<li class="nav-item {{ Request::path() == '/' ? 'active' : '' }}" style="background-color: {{ $menu['bgcolor'] }};">
						<a href="{{ URL::to('/') }}{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}" class="nav-link" style="color: {{ $menu['color'] }};">{{ $menu['name'] }}</a>
					</li>
					@else
						@if(count(array_filter($menu['children'])) > 0)
						<li class="nav-item dropdown" style="background-color: {{ $menu['bgcolor'] }};">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-{{ $key }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: {{ $menu['color'] }};">
							{{ $menu['name'] }}
							</a>
							<div class="dropdown-menu shadow" aria-labelledby="navbarDropdown-{{ $key }}">
								@foreach($menu['children'][0] as $children)
									<a class="dropdown-item" href="{{ URL::to($children['url']) }}{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">{{ $children['name'] }}</a>
								@endforeach
							</div>
						</li>
						@else
							<li class="nav-item	{{ strpos(Request::url(), $menu['url']) ? 'active' : '' }}" style="background-color: {{ $menu['bgcolor'] }};">
								<a href="{{ URL::to($menu['url']) }}{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}" class="nav-link" style="color: {{ $menu['color'] }};">{{ $menu['name'] }}</a>
							</li>
						@endif
					@endif
				@endforeach
				@if(!Auth::guest())
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #eeeeee;">
							<img src="{{ Auth::user()->foto != '' ? asset('assets/images/users/'.Auth::user()->foto) : asset('assets/images/default/user.jpg') }}" height="40">
						</a>
						<div class="dropdown-menu shadow" aria-labelledby="navbarDropdownUser">
							<a class="dropdown-item" href="{{ Auth::user()->is_admin == 1 ? '/admin' : '/member' }}">Dashboard</a>
							<a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Logout</a>
							<form id="form-logout" class="d-none" method="post" action="{{ Auth::user()->is_admin == 1 ? '/admin/logout' : '/member/logout' }}">
								{{ csrf_field() }}
							</form>
						</div>
					</li>
				@else
					<li class="nav-item	{{ strpos(Request::url(), '/login') ? 'active' : '' }}" style="background-color: #fdd100;">
						<a href="/login{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}" class="nav-link" style="color: generate_color('#fdd100');">Login</a>
					</li>
					<li class="nav-item	{{ strpos(Request::url(), '/register') ? 'active' : '' }}" style="background-color: #ff9800;">
						<a href="/register{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}" class="nav-link" style="color: {{ generate_color('#ff9800') }};">Daftar</a>
					</li>
				@endif
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->