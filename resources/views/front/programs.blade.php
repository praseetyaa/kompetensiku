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
<section id="program-content">
	<div class="container">
        <div class="row">
            <div class="col-6 col-md-4 col-lg-3 mb-3" 
                v-if="item!=null"
                v-for="item in items">
                <div class="card border-0 shadow-sm rounded-1" 
                    data-bs-toggle="tooltip"
                    data-bs-placement="bottom"
                    :title="item.subtitle">
                    <a href="/program/single-program" class="card-link">
                        <img :src="item.img" class="card-img-top rounded-1" alt="thumbnail">
                    </a>
                    <div class="card-img-overlay h-fit w-fit">
                        <p class="card-title bg-theme-1 text-white py-1 px-2 w-fit rounded"><i class="fas fa-cloud"></i> Online</p>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-12 text-truncate">
                                @{{ item.subtitle }}
                            </div>
                        </div>
                        <a href="/program/single-program" class="btn btn-theme-1 w-100">Detail</a>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>

@endsection
@section('js-extra')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>
@endsection