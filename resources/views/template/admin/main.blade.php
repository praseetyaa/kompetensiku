<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Admin Area | {{ get_website_name() }} &#8211; {{ get_tagline() }}</title>
    @include('template/admin/_head')
    @include('template/admin/_css')
    @yield('css-extra')
</head>

<body>
    @include('template/admin/_preloader')
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        @include('template/admin/_header')
        @include('template/admin/_sidebar')
        @yield('content')
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    @include('template/admin/_js')
    @yield('js-extra')
</body>

</html>