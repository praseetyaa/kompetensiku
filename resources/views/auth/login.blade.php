@extends('template/guest/main')

@section('content')

<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-12 col-lg-6">
            <div class="card border-0 rounded-1 shadow-sm">
                <div class="card-body">
                    <div class="text-center">
                        <a href="/{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}"><img src="{{ asset('assets/images/logo/'.get_logo()) }}" width="170" alt="logo" /></a>
                        <h3 class="mt-4">Masuk</h3>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal mt-2" id="loginform" action="/login" method="post">
                        {{ csrf_field() }}
                        @if(isset($message))
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text p-0 border-0 rounded {{ $errors->has('username') ? 'border-danger bg-danger' : 'bg-success' }}" id="basic-addon1"><!-- <i class="ti-user"></i> --></span>
                                    </div>
                                    <input type="text" name="username" class="form-control rounded {{ $errors->has('username') ? 'border-danger' : '' }}" value="{{ old('username') }}" placeholder="Email atau Username" aria-label="Username" aria-describedby="basic-addon1">
                                    @if($errors->has('username'))
                                    <small class="form-row col-12 mt-1 text-danger">{{ ucfirst($errors->first('username')) }}</small>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text p-0 border-0 rounded {{ $errors->has('password') ? 'border-danger bg-danger' : 'bg-success' }}" id="basic-addon2"><!-- <i class="ti-pencil"></i> --></span>
                                    </div>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control rounded-start {{ $errors->has('password') ? 'border-danger' : '' }}" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                                        <a href="#" class="input-group-text bg-theme-1 border-0 rounded text-white {{ $errors->has('password') ? 'border-danger bg-danger' : 'bg-theme-1' }}" id="btn-toggle-password"><i class="fa fa-eye"></i></a>
                                    </div>
                                    @if($errors->has('password'))
                                    <small class="form-row col-12 mt-1 text-danger">{{ ucfirst($errors->first('password')) }}</small>
                                    @endif
                                </div>
                                <div class="lupa-password text-right mb-2">
                                    <a href="/recovery-password" class="color-theme-1">Lupa password?</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-theme-1 mb-3 w-100" type="submit">Masuk</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <div class="">
                                        <p class="text-center border-or">Belum punya akun?</p>
                                       <!--  <a class="btn btn-light w-100" href="/register{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">Daftar</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 d-none d-lg-block">
            <div>
                <img class="img-fluid" src="{{ asset('assets/images/illustration/undraw_Login_re_4vu2.svg') }}">
            </div>
        </div>
    </div>
</div>

@yield('js-extra')
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
<script type="text/javascript">
     $(document).on("click", ".navbar-toggler", function(e){
        e.preventDefault();
        if($(".navbar-collapse").hasClass('show'))
            $(".navbar-collapse").removeClass('show')
        else
            $(".navbar-collapse").addClass('show')
     });
</script>
@endsection