
<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3">
                        <div class="logo-img">
                            <a href="{{ URL::to('/') }}{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">
                                <img src="{{ asset('assets/images/logo/'.get_logo()) }}" height="50" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9">
                        <div class="menu_wrap d-none d-lg-block">
                            <div class="menu_wrap_inner d-flex align-items-center justify-content-end">
                                <div class="main-menu">
                                    <nav>
                                        <ul id="navigation">
                                            @foreach(generate_menu() as $key=>$menu)
                                                @if($menu['url'] == '/')
                                                    <li><a class="{{ Request::path() == '/' ? 'active' : '' }}" href="{{ URL::to('/') }}{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">{{ $menu['name'] }}</a></li>
                                                @else
						                            @if(count(array_filter($menu['children'])) > 0)
                                                        <li><a href="#">{{ $menu['name'] }} <i class="ti-angle-down"></i></a>
                                                            <ul class="submenu">
								                                @foreach($menu['children'][0] as $children)
                                                                <li><a href="{{ URL::to($children['url']) }}{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">{{ $children['name'] }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @else
                                                        <li><a href="{{ URL::to($menu['url']) }}{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">{{ $menu['name'] }}</a></li>
                                                    @endif
                                                @endif
                                            @endforeach
                                            @if(!Auth::guest())
                                                <li><a href="#"><img src="{{ Auth::user()->foto != '' ? asset('assets/images/users/'.Auth::user()->foto) : asset('assets/images/default/user.jpg') }}" height="40"></a>
                                                    <ul class="submenu">
                                                        <li><a href="{{ Auth::user()->is_admin == 1 ? '/admin' : '/member' }}">Dashboard</a></li>
                                                        <li><a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Logout</a></li>
                                                        <form id="form-logout" class="d-none" method="post" action="{{ Auth::user()->is_admin == 1 ? '/admin/logout' : '/member/logout' }}">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </ul>
                                                </li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                                @if(Auth::guest())
                                <div class="book_room">
                                    <div class="book_btn" style="margin-right: 25px;">
                                        <a class="" href="/login">Login</a>
                                    </div>
                                    <div class="book_btn">
                                        <a class="" href="/register{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">Daftar</a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-end -->