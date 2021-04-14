@extends('template/guest/main')

@section('title', 'Program | ')

@section('content')

<div class="container mt-3">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb bg-white p-3 shadow-sm rounded-1">
	    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
	    <li class="breadcrumb-item active" aria-current="page">Program</a></li>
	  </ol>
	</nav>
</div>
<section>
	<div class="container">
        <div class="row">
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="card border-0 shadow-sm rounded-1">
                    <a href="#" class="card-link">
                        <img src="https://kompetensiku.id/assets/images/others/about-1-fix.jpg" class="card-img-top rounded-1" alt="thumbnail">
                    </a>
                    <div class="card-body text-center">
                        <p>Sertifikasi Analis Efek</p>
                        <button class="btn btn-theme-1 w-100">Detail</button>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="card border-0 shadow-sm rounded-1">
                    <a href="#" class="card-link">
                        <img src="https://kompetensiku.id/assets/images/others/about-1-fix.jpg" class="card-img-top rounded-1" alt="thumbnail">
                    </a>
                    <div class="card-img-overlay h-fit w-fit">
                        <p class="card-title bg-theme-1 text-white py-1 px-2 w-fit rounded"><i class="fas fa-cloud"></i> Online</p>
                    </div>
                    <div class="card-body text-center">
                        <p>Tingkatkan Penjualan dengan Facebook Marketing</p>
                        <button class="btn btn-theme-1 w-100">Detail</button>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>

@endsection