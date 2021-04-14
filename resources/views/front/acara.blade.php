@extends('template/guest/main')

@section('title', 'Program | ')

@section('content')

<div class="container mt-3">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb bg-white p-3 shadow-sm rounded-1">
	    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
	    <li class="breadcrumb-item active" aria-current="page">Acara</a></li>
	  </ol>
	</nav>
</div>
<section>
	<div class="container">
        <div class="row">
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="card border-0 shadow-sm rounded-1">
                    <a href="#">
                        <img class="card-img-top rounded-1" src="{{asset('assets/images/default/artikel.jpg') }}" alt="thumbnail">
                    </a>
                    <div class="card-body">
                        <a class="text-decoration-none text-body" href="#">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                        </a>
                    </div>
                    <div class="card-footer bg-transparent mx-3 px-0 text-muted d-flex justify-content-between align-items-center">
                        <span><i class="fa fa-calendar"></i> 20/23/2990</span>
                        <span><i class="fa fa-comments"></i> 3</span>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>

@endsection