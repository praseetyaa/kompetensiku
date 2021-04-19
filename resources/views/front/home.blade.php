@extends('template/guest/main')

@section('content')
<section class="section-carousel">
	<div class="container pb-3 pt-0 pt-md-3 px-0 px-lg-auto">
		<div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
		  <div class="carousel-indicators">
		    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
		    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
		  </div>
		  <div class="carousel-inner rounded-0 rounded-md-1 shadow-sm">
		    <div class="carousel-item active" data-bs-interval="10000">
		      <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="d-block" alt="carousel"
		      	style="background-image: url('https://kompetensiku.id/assets/images/others/slider-1.jpg'); background-size: cover; background-repeat: no-repeat; width: 100%; height: 400px">
		    </div>
		    <div class="carousel-item" data-bs-interval="2000">
		      <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="d-block" alt="carousel"
		      	style="background-image: url('https://kompetensiku.id/assets/images/others/slider-2.jpg'); background-size: cover; background-repeat: no-repeat; width: 100%; height: 400px">
		    </div>
		    <div class="carousel-item">
		      <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="d-block" alt="carousel"
		      	style="background-image: url('https://kompetensiku.id/assets/images/others/slider-3.jpg'); background-size: cover; background-repeat: no-repeat; width: 100%; height: 400px">
		    </div>
		  </div>
		  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Previous</span>
		  </button>
		  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Next</span>
		  </button>
		</div>
	</div>
</section>
<section class="section-intro">
	<div class="container my-5">
		<div class="row">
			<div class="content-intro col-6 col-md-4 col-lg-3 mb-3">
				<div class="wrap-img bg-white rounded-1 shadow-sm p-3 mb-3 mx-auto w-fit">
					<img width="50" src="{{asset('assets/images/icons/role-model.svg')}}">
				</div>
				<div class="caption text-center">
					<h5>Fasilitator Handal</h5>
					<p>Fasilitator merupakan praktisi yang telah berpengalaman dibidangnya</p>
				</div>
			</div>
			<div class="content-intro col-6 col-md-4 col-lg-3 mb-3">
				<div class="wrap-img bg-white rounded-1 shadow-sm p-3 mb-3 mx-auto w-fit">
					<img width="50" src="{{asset('assets/images/icons/homework.svg')}}">
				</div>
				<div class="caption text-center">
					<h5>Materi Relevan</h5>
					<p>Materi terstandarisasi oleh Badan Nasional Sertifikasi Profesi (BNSP)</p>
				</div>
			</div>
			<div class="content-intro col-6 col-md-4 col-lg-3 mb-3">
				<div class="wrap-img bg-white rounded-1 shadow-sm p-3 mb-3 mx-auto w-fit">
					<img width="50" src="{{asset('assets/images/icons/tutorial.svg')}}">
				</div>
				<div class="caption text-center">
					<h5>Mudah Diakses</h5>
					<p>Pelatihan yang mudah diakses kapan saja dan dimana saja</p>
				</div>
			</div>
			<div class="content-intro col-6 col-md-4 col-lg-3 mb-3">
				<div class="wrap-img bg-white rounded-1 shadow-sm p-3 mb-3 mx-auto w-fit">
					<img width="50" src="{{asset('assets/images/icons/struggle.svg')}}">
				</div>
				<div class="caption text-center">
					<h5>Investasi Terjangkau</h5>
					<p>Materi lengkap dengan harga yang terjangkau</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-program">
	<div class="container my-5">
		<div class="heading mb-3">
			<h5>Program</h5>
			<div id="typed-strings">
				<p>Program Pelatihan dan Sertifikasi <span class="fw-bold">Profesi Kepelatihan</span></p>
				<p>Program Pelatihan dan Sertifikasi <span class="fw-bold">Praktisi Sumber Daya Manusia</span></p>
				<p>Program Pelatihan dan Sertifikasi <span class="fw-bold">Profesi UMKM</span></p>
				<p>Program Pelatihan dan Sertifikasi <span class="fw-bold">Profesi Profesi Teknologi Digital</span></p>
			</div>
			<span id="typed"></span>
		</div>
        <div class="row">
        	@if(count($program_semua)>0)
            @foreach($program_semua as $data)
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="card border-0 shadow-sm rounded-1" 
                    data-bs-toggle="tooltip"
                    data-bs-placement="bottom"
                    title="{{$data->program_title}}">
                    <a href="/program/{{$data->program_permalink}}" class="card-link">
                        <img src="{{asset('assets/images/cover-program/'.$data->program_gambar) }}" class="card-img-top rounded-1" alt="thumbnail">
                    </a>
                    <div class="card-img-overlay h-fit w-fit">
                        <small class="card-title bg-theme-1 text-white py-1 px-2 w-fit rounded">{{$data->kategori}}</small>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-12 text-truncate">
                                {{$data->program_title}}
                            </div>
                        </div>
                        <a href="/program/{{$data->program_permalink}}" class="btn btn-theme-1 w-100">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="text-center my-5">
                <img src="{{asset('assets/images/icons/cloud-network.svg')}}" width="150">
                <h3>Oh tidak! Data Belum Tersedia</h3>
                <p>Data ini akan kami sediakan secepat kilat</p>
            </div>
            @endif
        </div>
		<div class="text-center mt-3">
			<a href="/program" class="btn btn-theme-1 px-4">Lihat Lainya</a>
		</div>
	</div>
</section>
<section class="section-partner">
	<div class="container my-5">
		<div class="heading">
			<h5>Mitra</h5>
			<p>Mitra Kami</p>
		</div>
		<div class="card border-0 shadow-sm rounded-1">
			<div class="card-body">
				<div class="row align-items-center justify-content-center">
					@foreach($mitra as $data)
					<div class="col-4 col-md-3 col-lg-2 mb-3 mb-lg-0 mt-3 mt-lg-0">
		                <div class="text-center">
		                    <img src="{{ asset('assets/images/mitra/'.$data->logo_mitra) }}" width="100" alt="mitra">
		                </div>
					</div>
		            @endforeach
	        	</div>
	        </div>
		</div>
	</div>
</section>
<section class="section-artikel">
	<div class="container my-5">
		<div class="heading">
			<h5>Artikel</h5>
		</div>
        <div class="row">
        	@if(count($artikel)>0)
			@foreach($artikel as $data)
            <div class="col-6 col-md-4 col-lg-3 mb-3">
				<div class="card border-0 shadow-sm rounded-1">
                    <a href="/artikel/{{ $data->blog_permalink }}">
                        <img class="card-img-top rounded-1" src="{{ $data->blog_gambar != '' ? asset('assets/images/blog/'.$data->blog_gambar) : asset('assets/images/default/artikel.jpg') }}" alt="thumbnail">
                    </a>
                	<div class="card-body">
                        <div class="row mb-2">
                            <div class="col-12 text-truncate">
			                    <a class="text-decoration-none text-body" href="/artikel/{{ $data->blog_permalink }}">
			                        <span>{{ $data->blog_title }}</span>
			                    </a>
                            </div>
                        </div>
	                </div>
                    <div class="card-footer bg-transparent mx-3 px-0 text-muted d-flex justify-content-between align-items-center">
                        <span><i class="fa fa-calendar"></i> {{ date('d/m/Y', strtotime($data->blog_at)) }}</span>
                        <span><i class="fa fa-comments"></i> {{ count_comments($data->id_blog) }}</span>
                    </div>
           		</div>
           	</div>
            @endforeach
            @else
            <div class="text-center my-5">
                <img src="{{asset('assets/images/icons/cloud-network.svg')}}" width="150">
                <h3>Oh tidak! Data Belum Tersedia</h3>
                <p>Data ini akan kami sediakan secepat kilat</p>
            </div>
            @endif
        </div>
	</div>
</section>
<section class="bg-white">
    <div class="container py-5 rounded-1">
        <div class="row align-items-center">
        	<!-- <div class="col-6 col-md-auto col-lg-auto mb-3 mb-lg-0 text-center text-lg-start order-2 order-md-1">
        		<img src="{{asset('assets/images/icons/987628.svg')}}" width="100">
        	</div> -->
            <div class="col-12 col-md col-lg mb-3 mb-lg-0 text-center text-lg-center order-3 order-md-2">
                <h3 class="mb-3">Siap menjadi kompeten bersama Kami?</h3>
                <a href="https://wa.me/{{ get_nomor_whatsapp() }}" class="btn btn-theme-1 btn-lg" target="_blank">Hubungi Kami</a>
            </div>
            <!-- <div class="col-6 col-md-auto col-lg-auto mb-3 mb-lg-0 text-center text-lg-end order-1 order-md-3">
            	<img src="{{asset('assets/images/icons/987611.svg')}}" width="100">
            </div> -->
        </div>
    </div>
</section>
@endsection
@section('js-extra')
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>
<script>
  var typed = new Typed('#typed', {
    stringsElement: '#typed-strings',
    loop: true,
    typeSpeed: 10,
    smartBackspace: true,
  });
</script>
@endsection