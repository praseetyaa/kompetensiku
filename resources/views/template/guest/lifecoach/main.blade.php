<!DOCTYPE html>
<html lang="en">
<head>

	<title>@yield('title') {{ get_website_name() }} &#8211; {{ get_tagline() }}</title>

	@include('template/guest/_head')

	@include('template/guest/_css')

	@yield('css-extra')

</head>
<body>

    <div class="wrap">

		@include('template/guest/_header')
		
		@yield('content')
		
		@include('template/guest/_footer')

		@include('template/guest/_preloader')
		
	</div>
	
	@include('template/guest/_js')

	@yield('js-extra')

</body>
</html>