<!DOCTYPE html>
<html lang="zxx">
<head>
    @include('template/guest/loans2go/_head')
    <style type="text/css">
		html, body {font-family: Lato;}
		p {font-size: 1rem;}
		.btn-link-primary {color: #340369;}
		.btn-link-primary:hover {color: #340369; text-decoration: underline;}
		.btn-link-secondary {color: #fdd100;}
		.btn-link-secondary:hover {color: #fdd100; text-decoration: underline;}
		.site-btn {color: #fff; background-color: #340369; border: 2px solid #340369;}
		.site-btn:hover {color: #340369; background-color: transparent;}
		.icon-box-item .ib-icon {color: #340369; border-color: #340369;}
		.icon-box-item:hover .ib-icon {color: #fdd100; background-color: #340369;}
		.sb-whatsapp {color: #333; background-color: #25D366; border-color: #25D366;}
		.sb-whatsapp:hover {color: #25D366; background-color: transparent;}
		
		.navbar-light .navbar-nav .nav-item {margin-left: .5rem; margin-right: .5rem;}
		.navbar-light .navbar-nav .nav-link {color: #333; font-size: 17px; font-weight: 600;}
		.navbar-light .navbar-nav .nav-link:hover {color: #340369;}
		.navbar-light .navbar-nav .active > .nav-link {color: #340369;}
		.btn-navbar {font-size: 17px; font-weight: 600; margin-left: .5rem; margin-right: .5rem;}
		.btn-login {background-color: #340369; border: 2px solid #340369; color: #fff; padding: 1rem; border-radius: 0;}
		.btn-login:hover {background-color: transparent; color: #340369;}
		.btn-register {background-color: #fdd100; border: 2px solid #fdd100; color: #340369; font-weight: 600; padding: 1rem; border-radius: 0;}
		.btn-register:hover {background-color: transparent; color: #340369;}
		.btn-register-2 {font-size: 1rem; text-transform: uppercase; font-weight: 600; background-color: #fdd100; border: 2px solid #fdd100; color: #340369; padding: 1rem 2rem; border-radius: 0;}
		.btn-register-2:hover {background-color: transparent; color: #fdd100;}
		.navbar-light .navbar-toggler {background-color: #fdd100; border-width: 2px; border-color: #fdd100; border-radius: 0;}
		.navbar-light .navbar-toggler:hover {background-color: transparent; border-radius: 0;}
		
		.page-top-section {border-top: 5px solid #fdd100!important;}
		
        .footer-section {background-color: #46157a;}
        .footer-widget ul li {margin-bottom: 5px;}
    </style>
    @yield('css-extra')
</head>
<body>
    @include('template/guest/loans2go/_preloader')
    @include('template/guest/loans2go/_header')
    @yield('content')
    @include('template/guest/loans2go/_footer')
    @include('template/guest/loans2go/_js')
    @yield('js-extra')
</body>
</html>
