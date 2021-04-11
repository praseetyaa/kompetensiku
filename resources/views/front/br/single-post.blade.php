@extends('template/guest/br/main')

@section('title', $blog->blog_title.' - Artikel | ')

@section('content')

   <!-- bradcam_area_start -->
   <div class="bradcam_area breadcam_bg overlay" style="background-image: url('{{ $blog->blog_gambar != '' ? asset('assets/images/blog/'.$blog->blog_gambar) : asset('assets/images/default/artikel.jpg') }}');">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <h3>{{ $blog->blog_title }}</h3>
              </div>
          </div>
      </div>
  </div>
  <!-- bradcam_area_end -->

   <!--================Blog Area =================-->
   <section class="single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="{{ $blog->blog_gambar != '' ? asset('assets/images/blog/'.$blog->blog_gambar) : asset('assets/images/default/artikel.jpg') }}" alt="">
                  </div>
                  <div class="blog_details">
                     <h2>{{ $blog->blog_title }}</h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-calendar"></i> {{ date('d/m/Y H:i', strtotime($blog->blog_at)) }}</a></li>
                        <li><a href="#"><i class="fa fa-user"></i> {{ $blog->nama_user }}</a></li>
                        <li><a href="#"><i class="fa fa-comments"></i> {{ count_comments($blog->id_blog) }}</a></li>
                     </ul>
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
               <!--
               <div class="navigation-top">
                  <div class="navigation-area">
                     <div class="row">
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                           <div class="thumb">
                              <a href="#">
                                 <img class="img-fluid" src="img/post/preview.png" alt="">
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="#">
                                 <span class="lnr text-white ti-arrow-left"></span>
                              </a>
                           </div>
                           <div class="detials">
                              <p>Prev Post</p>
                              <a href="#">
                                 <h4>Space The Final Frontier</h4>
                              </a>
                           </div>
                        </div>
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                           <div class="detials">
                              <p>Next Post</p>
                              <a href="#">
                                 <h4>Telescopes 101</h4>
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="#">
                                 <span class="lnr text-white ti-arrow-right"></span>
                              </a>
                           </div>
                           <div class="thumb">
                              <a href="#">
                                 <img class="img-fluid" src="img/post/next.png" alt="">
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               -->
               <div class="blog-author">
                  <div class="media align-items-center">
                     <img src="{{ $blog->foto != '' ? asset('assets/images/users/'.$blog->foto) : asset('assets/images/users/default.jpg') }}" alt="">
                     <div class="media-body">
                        <a href="#">
                           <h4>{{ $blog->nama_user }}</h4>
                        </a>
                        <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                           our dominion twon Second divided from</p>
                     </div>
                  </div>
               </div>
               <div class="comments-area">
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
                                        <button type="button" data-id="{{ $komentar->id_komentar }}" class="btn btn-sm btn-outline-danger btn-delete">Hapus</a>
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
                                                <button type="button" data-id="{{ $komentar_child->id_komentar }}" class="btn btn-sm btn-outline-danger btn-delete">Hapus</a>
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
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget search_widget">
                     <form action="/search" method="post">
                        <div class="form-group">
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" name="keyword" placeholder='Ketik kata kunci dan tekan Enter'
                                 onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ketik kata kunci dan tekan Enter'" required>
                              <div class="input-group-append">
                                 <button class="btn" type="button"><i class="ti-search"></i></button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </aside>
                  <aside class="single_sidebar_widget post_category_widget">
                     <h4 class="widget_title">Kategori</h4>
                     <ul class="list cat-list">
                        @foreach($kategori as $data)
                        <li>
                           <a href="/kategori/{{ $data->slug }}" class="d-flex">
                              <p class="mr-1">{{ $data->kategori }}</p>
                              <p>({{ count_article_categories($data->id_ka) }})</p>
                           </a>
                        </li>
                        @endforeach
                     </ul>
                  </aside>
                  <aside class="single_sidebar_widget popular_post_widget">
                     <h3 class="widget_title">Artikel Terbaru</h3>
                     @foreach($recents as $recent)
                     <div class="media post_item">
                        <img width="70" src="{{ $recent->blog_gambar != '' ? asset('assets/images/blog/'.$recent->blog_gambar) : asset('assets/images/default/artikel.jpg') }}" alt="post">
                        <div class="media-body">
                           <a href="/artikel/{{ $recent->blog_permalink }}">
                              <h3>{{ $recent->blog_title }}</h3>
                           </a>
                           <p>{{ date('d/m/Y', strtotime($recent->blog_at)) }}</p>
                        </div>
                     </div>
                     @endforeach
                  </aside>
                  <aside class="single_sidebar_widget tag_cloud_widget">
                     <h4 class="widget_title">Tag</h4>
                     <ul class="list">
                        @foreach($tag as $data)
                        <li>
                           <a href="/tag/{{ $data->slug }}">{{ $data->tag }}</a>
                        </li>
                        @endforeach
                     </ul>
                  </aside>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->

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