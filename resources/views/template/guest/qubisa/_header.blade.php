
            <header>
                <nav class="navbar navbar-expand-lg navbar-expand-md navbar-light py-1">
                    <div class="container"> <button type="button" id="sidebarCollapse" class="navbar-toggler"> <!--span class="navbar-toggler-icon"></span--> <i data-feather="menu"></i> </button>
						<a class="navbar-brand " href="/"><img src="{{ asset('assets/images/logo/'.get_logo()) }}" alt="Logo PersonalityTalk"></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
						<div class="collapse navbar-collapse" id="navbarResponsive">
							<div class="header-right ml-auto">
								<ul class="navbar-nav n-log">
									<li class="nav-item"> <a class="btn btn-default btn-borderless" href="/">Home</a> </li>
									<li class="nav-item dropdown">
										<a class="btn btn-default btn-borderless dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Program</a>
										<div class="dropdown-menu dropdown-menu-right">
											<a href="{{ Request::path() == '/' ? '#online-class' : '/online-class' }}" class="dropdown-item" type="button">Online Class</a>
											<a href="{{ Request::path() == '/' ? '#online-course' : '/online-course' }}" class="dropdown-item" type="button">Online Course</a>
											<a href="{{ Request::path() == '/' ? '#workshop' : '/workshop' }}" class="dropdown-item" type="button">Workshop</a>
											<a href="{{ Request::path() == '/' ? '#sertifikasi' : '/sertifikasi' }}" class="dropdown-item" type="button">Sertifikasi</a>
										</div>
									</li>
									<li class="nav-item"> <a class="btn btn-default btn-borderless" href="https://karir.psikologanda.com/login" target="_blank">Psikolog</a> </li>
									<li class="nav-item"> <a class="btn btn-default btn-borderless" href="{{ Request::path() == '/' ? '#career' : '/karir' }}">Karir</a> </li>
									<li class="nav-item"> <a class="btn btn-default ml-2" href="https://tes.psikologanda.com/login" target="_blank">Tes Online</a> </li>
									<li class="nav-item"> <a class="btn btn-primary ml-2" href="/login">Masuk</a> </li>
									<li class="nav-item"> <a class="btn btn-secondary ml-2" href="/register">Daftar</a> </li>
								</ul>
							</div>
						</div>
					</div>
				</nav>
			</header>