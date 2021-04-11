@extends('template/guest/lifecoach/main')

@section('title', $tag->tag.' | ')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('templates/lifecoach/images/bg_2.jpg') }}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end">
      <div class="col-md-12 ftco-animate my-auto">
        <p class="breadcrumbs mb-2">
          <span class="mr-0"><a href="/{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">Home <i class="ion-ios-arrow-forward"></i></a></span>
          <span class="mr-0"><a href="#">Tag <i class="ion-ios-arrow-forward"></i></a></span>
          <span>{{ $tag->tag }} <i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-0 bread">{{ $tag->tag }}</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-white">
  <div class="container">
    <div class="row d-flex">
      @foreach($blogs as $blog)
      <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <a href="/artikel/{{ $blog->blog_permalink }}" class="block-20 rounded" style="background-image: url('{{ $blog->blog_gambar != '' ? asset('assets/images/blog/'.$blog->blog_gambar) : asset('assets/images/default/artikel.jpg') }}');">
          </a>
          <div class="text mt-3">
            <div class="meta mb-2">
              <div><a href="#" class="meta-chat"><span class="fa fa-calendar"></span> {{ date('d/m/Y', strtotime($blog->blog_at)) }}</a></div>
              <div><a href="#" class="meta-chat"><span class="fa fa-user"></span> {{ $blog->nama_user }}</a></div>
              <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> {{ count_comments($blog->id_blog) }}</a></div>
            </div>
            <h3 class="heading"><a href="/artikel/{{ $blog->blog_permalink }}">{{ $blog->blog_title }}</a></h3>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="row mt-5">
      <div class="col-auto mx-auto text-center">
          {!! $blogs->links() !!}
      </div>
    </div>
  </div>
</section>

@endsection

@section('css-extra')

<style type="text/css">
  .breadcrumbs .mr-0:after {content: '/';}
</style>

@endsection