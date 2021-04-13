<!DOCTYPE HTML>
<html lang="en">
  <head>
    @include('template/guest/_head')
    @yield('css-extra')
	<title>@yield('title') {{ get_website_name() }} &#8211; {{ get_tagline() }}</title>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    @include('template/guest/_header')

    @yield('content')

    @include('template/guest/_footer')

    @include('template/guest/_js')

    @yield('js-extra')
</body>

</html>