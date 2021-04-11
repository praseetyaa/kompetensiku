
	<title>@yield('title') {{ get_website_name() }} &#8211; {{ get_tagline() }}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=0"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="robots" content="index, follow"/>
	<meta name="revisit-after" content="1 days"/>
	<meta name="title" content="{{ get_website_name() }}"/>
	<meta name="description" content="{{ get_website_name() }}"/>
	<meta name="keywords" content="{{ get_website_name() }}"/>
	<meta name="author" content="{{ get_website_name() }}"/>
	<meta itemProp="name" content="{{ get_website_name() }}"/>
	<meta itemprop="url" content="{{ URL::to('/') }}" />
	<meta itemProp="description" content="{{ get_website_name() }}"/>
	<meta itemProp="image" content="{{ asset('assets/images/logo/'.get_icon()) }}"/>
	<meta property="og:site_name" content="{{ get_website_name() }}" />
	<meta property="og:title" content="{{ get_website_name() }}" />
	<meta property="og:description" content="{{ get_website_name() }}"/>
	<meta property="og:type" content="website" />
	<meta property="og:image" content="{{ asset('assets/images/logo/'.get_icon()) }}" />
	<meta property="og:url" content="{{ URL::to('/') }}" />
	<meta name="twitter:card" content="photo" />
	<meta name="twitter:title" content="{{ get_website_name() }}" />
	<meta name="twitter:description" content="{{ get_website_name() }}" />
	<meta name="twitter:image" content="{{ asset('assets/images/logo/'.get_icon()) }}" />
	<meta name="twitter:domain" content="qubisa.com"/>
	<link rel="canonical" href="{{ URL::to('/') }}"/>
	<link rel="image_src" href="{{ asset('assets/images/logo/'.get_icon()) }}"/>
	<link rel="shortcut icon" href="{{ asset('assets/images/logo/'.get_icon()) }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="https://www.qubisa.com/assets/img/apple-touch-icon.png?v=0.1" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://www.qubisa.com/assets/css/style.min.css?v=YXNzZXRzIHZlcnNpb24gbm93IGlzIDAuNTU=">
    <script type="text/javascript" src="https://www.qubisa.com/assets/libs/jquery/js/jquery.min.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-164059981-1');
    </script>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-M4QR28H');
    </script>
    <link rel="stylesheet" type="text/css" href="https://www.qubisa.com/assets/libs/video-js/css/video-js.min.css">
    <link rel="stylesheet" type="text/css" href="https://www.qubisa.com/assets/libs/star-rating/css/star-rating-svg.css">
    <link rel="stylesheet" type="text/css" href="https://www.qubisa.com/assets/libs/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://www.qubisa.com/assets/libs/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://www.qubisa.com/assets/css/homev2.min.css?v=YXNzZXRzIHZlcnNpb24gbm93IGlzIDAuNTU=">

	<style type="text/css">
		/* Sidebar */
		#sidebar {padding: 1rem;}
		
		/* Navbar */
		@media (max-width: 767px) { header > nav .navbar-brand {right: 0px!important;} }
		header > nav .navbar-brand img, header > nav .navbar-text img {width: 200px!important;}
		header > nav .search-wrapper {border: 1px solid #505763;}
		header > nav ul.n-log li .btn {padding: 8px!important; width: auto!important;}
		header > nav ul.n-log li .btn.btn-borderless {border-width: 0px!important;}
		.dropdown-item:hover, .dropdown-item:active {background-color: #fb8312!important; color: #fff!important;}
		.btn.btn-default:hover {color: #fb8312!important; border-color: #fb8312!important;}
		.btn.btn-primary {background-color: #fb8312!important; border-color: #fb8312!important;}
		.btn.btn-primary:hover {background-color: #c16c1c!important; border-color: #c16c1c!important;}
		.btn.btn-secondary {background-color: #34495e!important; color: #fff!important; border-color: #34495e!important;}
		.btn.btn-secondary:hover {background-color: #668baf!important; border-color: #668baf!important;}
		.link-primary {color: #fb8312!important;}
		.link-primary:hover, .link-primary:active {color: #c16c1c!important;}
		
		/* Footer */
		footer {background-color: #34495e!important;}
	</style>