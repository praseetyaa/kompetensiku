@extends('template/guest/main')

@section('title', 'Tag: '.$tag->tag.' | ')

@section('content')

<!-- bradcam_area_start -->
 <div class="bradcam_area breadcam_bg overlay" style="background-image: url('{{ asset('assets/images/others/slider-1.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Tag</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end -->

	<!-- Start Sample Area -->
	<section class="sample-text-area">
		<div class="container box_1170">
			<h3 class="text-heading">{{ $tag->tag }}</h3>
            <div class="row">
                @foreach($artikel as $data)
                <div class="col-lg-4 col-md-6">
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <a href="/artikel/{{ $data->blog_permalink }}">
                                <img class="card-img rounded-0" src="{{ $data->blog_gambar != '' ? asset('assets/images/blog/'.$data->blog_gambar) : asset('assets/images/default/artikel.jpg') }}" alt="">
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="/artikel/{{ $data->blog_permalink }}">
                                <h2>{{ $data->blog_title }}</h2>
                            </a>
                            <ul class="blog-info-link">
                                <li><i class="fa fa-calendar"></i> {{ date('d/m/Y', strtotime($data->blog_at)) }}</li>
                                <li><i class="fa fa-user"></i> {{ $data->nama_user }}</li>
                                <li><i class="fa fa-comments"></i> {{ count_comments($data->id_blog) }}</li>
                            </ul>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
            
            <nav class="blog-pagination justify-content-center d-flex">
                {!! $artikel->links() !!}
            </nav>
		</div>
	</section>
	<!-- End Sample Area -->

@endsection

@section('css-extra')

@endsection