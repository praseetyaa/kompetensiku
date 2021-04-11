<!DOCTYPE html>
<html lang="en">
<head>
	@include('template/guest/qubisa/_head')
	@yield('css-extra')
</head>
<body>
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M4QR28H" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <div class="wrapper">
        <!-- Sidebar -->
		@include('template/guest/qubisa/_sidebar')
        <!-- Sidebar -->
        <div id="content">
			@include('template/guest/qubisa/_header')
			@yield('content')
		</div>
	</div>
    <!-- Footer -->
	@include('template/guest/qubisa/_footer')
    <!-- Footer -->
	@include('template/guest/qubisa/_scroll-to-top')
	@include('template/guest/qubisa/_modals')
    <div class="main-overlay"></div>
	@include('template/guest/qubisa/_js')
	@yield('js-extra')
</body>
</html>