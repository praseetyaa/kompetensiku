@extends('template/guest/main')

@section('content')

<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-lg-6">
            <div class="card border-0 rounded-1 shadow-sm">
                <div class="card-body">
                    <div class="text-center">
                        <a href="/{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}"><img src="{{ asset('assets/images/logo/'.get_logo()) }}" width="170" alt="logo" /></a>
                        <h3 class="mt-4">Recovery Password</h3>
                    </div>
                    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
                        <div id="loginform">
                            <div class="text-center mb-3">
                                @if(Session::get('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                                @endif
                                <span>Masukkan email Anda di bawah ini dan Kami akan mengirimkan Anda instruksi untuk mengembalikan password Anda.</span>
                            </div>
                            <form method="post" action="/recovery-password">
                                {{ csrf_field() }}
                                <input type="hidden" name="referral" value="{{ Session::get('ref') }}">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                    <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" placeholder="Alamat Email" aria-label="Username" aria-describedby="basic-addon1">
                                    @if($errors->has('email'))
                                    <small class="form-row col-12 mt-1 text-danger">{{ ucfirst($errors->first('email')) }}</small>
                                    @endif
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-warning" href="/login">Kembali ke Login</a>
                                    <button class="btn btn-success float-right" type="submit">Recover</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-none d-lg-block">
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
