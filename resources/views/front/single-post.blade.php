@extends('template/guest/main')

@section('title', $blog->blog_title.' - Artikel | ')

@section('content')

<div class="container mt-3">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb bg-white p-3 shadow-sm rounded-1">
	    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
	    <li class="breadcrumb-item"><a href="/artikel">Artikel</a></li>
	    <li class="breadcrumb-item active" aria-current="page">{{ $blog->blog_title }}</li>
	  </ol>
	</nav>
</div>
<section>
  <div class="container">
     <div class="row">
        <div class="col-lg-8">
          	<div class="card">
          		<img class="card-img-top rounded-1" src="{{ $blog->blog_gambar != '' ? asset('assets/images/blog/'.$blog->blog_gambar) : asset('assets/images/default/artikel.jpg') }}" alt="artikel">
              	<div class="card-body">
					<h5>{{ $blog->blog_title }}</h5>
					<div class="d-flex text-muted">
						<span class="me-3"><i class="fa fa-calendar"></i> {{ date('d/m/Y H:i', strtotime($blog->blog_at)) }}</span>
						<span class="me-3"><i class="fa fa-user"></i> {{ $blog->nama_user }}</span>
						<span><i class="fa fa-comments"></i> {{ count_comments($blog->id_blog) }}</span>
					</div>
					 <div class="ql-snow"><div class="ql-editor p-0">{!! html_entity_decode($blog->konten) !!}</div></div>
					<ul class="tag-list">
					@foreach($blog_tags as $data)
					<li>
					   <a href="/tag/{{ $data->slug }}">{{ $data->tag }}</a>
					</li>
					@endforeach
					</ul>
	            </div>
			</div>
           	<div class="card comments-area my-3">
           	<div class="card-body">
              <h4>{{ count_comments($blog->id_blog) }} Komentar</h4>
              <form id="form-delete-comment" method="post" action="/komentar/delete">
                {{ csrf_field() }}
                <input type="hidden" name="id_komentar">
              </form>
              @if(!Auth::guest())
              <div class="comment-list">
                    <div class="single-comment">
                        <div class="user">
                            <div class="desc">
                                <form method="post" action="/komentar">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id_artikel" value="{{ $blog->id_blog }}">
                                    <input type="hidden" name="komentar_parent" value="0">
                                    <div class="form-group">
                                        <textarea name="komentar" rows="3" class="form-control" placeholder="Tulis komentar..." required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-outline-success btn-comment">Komentar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
              </div>
              @else
              <div class="comment-list">
                <div class="alert alert-warning text-center">
                    Anda harus login terlebih dahulu untuk dapat berkomentar.
                </div>
              </div>
              @endif
              @foreach($blog_komentar as $komentar)
                <div class="comment-list">
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb">
                                <img src="{{ $komentar->foto != '' ? asset('assets/images/users/'.$komentar->foto) : asset('assets/images/users/default.jpg') }}" alt="">
                            </div>
                            <div class="desc">
                                <p class="comment">{!! nl2br($komentar->komentar) !!}</p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <h5>
                                        <a href="#">{{ $komentar->nama_user }}</a>
                                        </h5>
                                        <p class="date">{{ generate_date($komentar->komentar_at) }}, {{ date('H:i', strtotime($komentar->komentar_at)) }}</p>
                                    </div>
                                </div>
                                @if(!Auth::guest())
                                <div class="reply-btn">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-answer">Balas</button>
                                    @if(Auth::user()->role == role_it() || Auth::user()->role == role_manajer() || Auth::user()->id_user == $komentar->id_user)
                                    <button type="button" data-id="{{ $komentar->id_komentar }}" class="btn btn-sm btn-outline-danger btn-delete">Hapus</button>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <form class="form-comment mt-2" method="post" action="/komentar">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_artikel" value="{{ $blog->id_blog }}">
                        <input type="hidden" name="komentar_parent" value="{{ $komentar->id_komentar }}">
                        <div class="form-group">
                            <textarea name="komentar" rows="3" class="form-control" placeholder="Tulis komentar..." required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-outline-success btn-comment">Komentar</button>
                            <button type="button" class="btn btn-sm btn-outline-warning btn-cancel">Batal</button>
                        </div>
                    </form>
                </div>
                @if(count(generate_comment_children($komentar->id_artikel, $komentar->id_komentar)) > 0)
                    @foreach(generate_comment_children($komentar->id_artikel, $komentar->id_komentar) as $komentar_child)
                        <div class="comment-list children">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="{{ $komentar_child->foto != '' ? asset('assets/images/users/'.$komentar_child->foto) : asset('assets/images/users/default.jpg') }}" alt="">
                                    </div>
                                    <div class="desc">
                                        <p class="comment">{!! nl2br($komentar_child->komentar) !!}</p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <h5>
                                                <a href="#">{{ $komentar_child->nama_user }}</a>
                                                </h5>
                                                <p class="date">{{ generate_date($komentar_child->komentar_at) }}, {{ date('H:i', strtotime($komentar_child->komentar_at)) }}</p>
                                            </div>
                                        </div>
                                        @if(!Auth::guest())
                                        <div class="reply-btn">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-answer">Balas</button>
                                            @if(Auth::user()->role == role_it() || Auth::user()->role == role_manajer() || Auth::user()->id_user == $komentar_child->id_user)
                                            <button type="button" data-id="{{ $komentar_child->id_komentar }}" class="btn btn-sm btn-outline-danger btn-delete">Hapus</button>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <form class="form-comment mt-2" method="post" action="/komentar">
                                {{ csrf_field() }}
                                <input type="hidden" name="id_artikel" value="{{ $blog->id_blog }}">
                                <input type="hidden" name="komentar_parent" value="{{ $komentar->id_komentar }}">
                                <div class="form-group">
                                    <textarea name="komentar" rows="3" class="form-control" placeholder="Tulis komentar..." required></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-outline-success btn-comment">Komentar</button>
                                    <button type="button" class="btn btn-sm btn-outline-warning btn-cancel">Batal</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                @endif
              @endforeach
          	</div>
           </div>
        </div>
        <div class="col-lg-4">
           <div class="blog_right_sidebar">
              <aside class="card mb-3">
              	<div class="card-body">
					<h4 class="widget_title">Kategori</h4>
					<ul class="list-unstyled m-0">
						@foreach($kategori as $data)
						<li>
						   <a href="/kategori/{{ $data->slug }}" class=" text-body d-flex justify-content-between">
						      <p class="me-1">{{ $data->kategori }}</p>
						      <p>({{ count_article_categories($data->id_ka) }})</p>
						   </a>
						</li>
						@endforeach
					</ul>
				</div>
              </aside>
              <aside class="card mb-3">
              	<div class="card-body">
                 <h3 class="widget_title">Artikel Terbaru</h3>
                 @foreach($recents as $recent)
                 <div class="media post_item">
                    <img class="rounded" width="70" src="{{ $recent->blog_gambar != '' ? asset('assets/images/blog/'.$recent->blog_gambar) : asset('assets/images/default/artikel.jpg') }}" alt="post">
                    <div class="media-body">
                       <a class="text-body" href="/artikel/{{ $recent->blog_permalink }}">
                          <span>{{ $recent->blog_title }}</span>
                       </a>
                       <p class="text-muted">{{ date('d/m/Y', strtotime($recent->blog_at)) }}</p>
                    </div>
                 </div>
                 @endforeach
             	</div>
              </aside>
              <aside class="card mb-3">
              	<div class="card-body">
                 <h4 class="widget_title">Tag</h4>
                 <ul class="list">
                    @foreach($tag as $data)
                    <li>
                       <a href="/tag/{{ $data->slug }}">{{ $data->tag }}</a>
                    </li>
                    @endforeach
                 </ul>
             	</div>
              </aside>
           </div>
        </div>
     </div>
  </div>
</section>

@endsection

@section('js-extra')

<script type="text/javascript">

  // Button Reply Komentar
  $(document).on("click", ".btn-answer", function(e){
    e.preventDefault();
    $(this).parents(".single-comment").next().fadeIn(500);
  });

  // Button Delete Komentar
  $(document).on("click", ".btn-delete", function(e){
    e.preventDefault();
    var id = $(this).data("id");
    var ask = confirm("Anda yakin ingin menghapus komentar ini?");
    if(ask){
      $("#form-delete-comment input[name=id_komentar]").val(id);
      $("#form-delete-comment").submit();
    }
  });

  // Button Cancel Komentar
  $(document).on("click", ".btn-cancel", function(e){
    e.preventDefault();
    $(this).parents(".form-comment").fadeOut(500);
  });

</script>

@endsection

@section('css-extra')

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style type="text/css">
   .tag-list li {display: inline-block;}
   .tag-list li a {display: inline-block; border: 1px solid #bebebe; background: #fff; padding: 4px 20px; margin-bottom: 8px; margin-right: 3px; transition: all 0.3s ease 0s; color: #888888; font-size: 13px;}
   .tag-list li a:hover {background: #32327f; color: #fff;}
   .reply-btn {margin-top: .5rem;}
   .form-comment {margin-left: 70px; display: none;}
   .comments-area .btn-reply {padding: 5px 0;}
   /* Quill */
   .ql-editor h2, .ql-editor h3 {margin-bottom: 1rem!important; font-weight: 600!important;}
   .ql-editor p {margin-bottom: 1rem!important; line-height: 1.8!important;}
   .ql-editor ol {padding-left: 30px!important;}
   .ql-editor ol li {font-size: 14px!important; color: #74757f!important; padding-left: 5px!important;}
</style>

@endsection