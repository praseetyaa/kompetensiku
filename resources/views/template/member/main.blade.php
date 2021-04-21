<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Member Area | {{ get_website_name() }} &#8211; {{ get_tagline() }}</title>
    @include('template/member/_head')
    @include('template/admin/_css')
    @yield('css-extra')
</head>

<body>
    @include('template/member/_preloader')
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        @include('template/member/_header')
        @include('template/member/_sidebar')
        @yield('content')
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    @include('template/member/_js')
    @yield('js-extra')
</body>

</html>