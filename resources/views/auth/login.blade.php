<!DOCTYPE html>
<html dir="ltr">

<head>
    <title>Login | {{ get_website_name() }} &#8211; {{ get_tagline() }}</title>
    @include('template/admin/_head')
    <style type="text/css">
        .auth-wrapper {height: calc(100vh)!important; background-color: {{ get_warna_primer() }}!important;}
        .auth-box {background-color: {{ get_warna_tersier() }}!important; border-color: {{ get_warna_sekunder() }}!important; margin: auto!important;}
		#loginform img {filter: brightness(0) invert(1);}
        .input-group>.input-group-append:not(:last-child)>.input-group-text {border-top-right-radius: 2px; border-bottom-right-radius: 2px;}
        #btn-toggle-password {cursor: pointer;}
    </style>
</head>

<body>
    <div class="main-wrapper">
        @include('template/admin/_preloader')
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
            <div class="auth-box border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><a href="/{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}"><img src="{{ asset('assets/images/logo/'.get_logo()) }}" height="100" alt="logo" /></a></span>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" id="loginform" action="/login" method="post">
                        {{ csrf_field() }}
						@if(isset($message))
						<div class="alert alert-danger">
							{{ $message }}
						</div>
						@endif
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white {{ $errors->has('username') ? 'border-danger bg-danger' : 'bg-success' }}" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="username" class="form-control {{ $errors->has('username') ? 'border-danger' : '' }}" value="{{ old('username') }}" placeholder="Email atau Username" aria-label="Username" aria-describedby="basic-addon1">
                                    @if($errors->has('username'))
                                    <small class="form-row col-12 mt-1 text-danger">{{ ucfirst($errors->first('username')) }}</small>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white {{ $errors->has('password') ? 'border-danger bg-danger' : 'bg-success' }}" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <a href="#" class="input-group-text text-white {{ $errors->has('password') ? 'border-danger bg-danger' : 'bg-success' }}" id="btn-toggle-password"><i class="fa fa-eye"></i></a>
                                    </div>
                                    @if($errors->has('password'))
                                    <small class="form-row col-12 mt-1 text-danger">{{ ucfirst($errors->first('password')) }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-warning btn-block mb-3" type="submit">Login</button>
                                        <a class="btn btn-block btn-danger" href="/recovery-password">Lupa password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <p class="text-center text-white">Belum punya akun?</p>
                                        <a class="btn btn-block btn-primary" href="/register{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">Daftar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('templates/matrix-admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('templates/matrix-admin/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('templates/matrix-admin/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>

    $(".preloader").fadeOut();

    // Button toggle password
    $(document).on("click", "#btn-toggle-password", function(e){
        e.preventDefault();
        if(!$(this).hasClass("show")){
            $("input[name=password]").attr("type","text");
            $(this).find(".fa").removeClass("fa-eye").addClass("fa-eye-slash");
            $(this).addClass("show");
        }
        else{
            $("input[name=password]").attr("type","password");
            $(this).find(".fa").removeClass("fa-eye-slash").addClass("fa-eye");
            $(this).removeClass("show");
        }
    });
    </script>

</body>

</html>