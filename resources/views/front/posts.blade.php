@extends('template/guest/main')

@section('title', 'Artikel | ')

@section('content')

<div class="container mt-3">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb bg-white p-3 shadow-sm rounded-1">
	    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
	    <li class="breadcrumb-item active" aria-current="page">Artikel</a></li>
	  </ol>
	</nav>
</div>
<section>
	<div class="container">
        <div class="row">
            @foreach($artikel as $data)
            <div class="col-6 col-md-4 col-lg-3 mb-3">
				<div class="card border-0 shadow-sm rounded-1">
                    <a href="/artikel/{{ $data->blog_permalink }}">
                        <img class="card-img-top rounded-1" src="{{ $data->blog_gambar != '' ? asset('assets/images/blog/'.$data->blog_gambar) : asset('assets/images/default/artikel.jpg') }}" alt="thumbnail">
                    </a>
                	<div class="card-body">
	                    <a class="text-decoration-none text-body" href="/artikel/{{ $data->blog_permalink }}">
	                        <span>{{ $data->blog_title }}</span>
	                    </a>
	                </div>
                    <div class="card-footer bg-transparent mx-3 px-0 text-muted d-flex justify-content-between align-items-center">
                        <span><i class="fa fa-calendar"></i> {{ date('d/m/Y', strtotime($data->blog_at)) }}</span>
                        <span><i class="fa fa-comments"></i> {{ count_comments($data->id_blog) }}</span>
                    </div>
           		</div>
           	</div>
            @endforeach
        </div>
        
        <nav class="blog-pagination justify-content-center d-flex">
            {!! $artikel->links() !!}
        </nav>
	</div>
</section>

@endsection

@section('css-extra')

@endsection