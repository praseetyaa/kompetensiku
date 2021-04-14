@extends('template/guest/main')

@section('title', $halaman->halaman_title.' | ')

@section('content')

<!-- bradcam_area_start -->
 <div class="bradcam_area breadcam_bg overlay" style="background-image: url('{{ asset('assets/images/others/slider-1.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>{{ $halaman->halaman_title }}</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end -->

	<!-- Start Sample Area -->
	<section class="sample-text-area">
		<div class="container box_1170">
			<h3 class="text-heading">{{ $halaman->halaman_title }}</h3>
		    <div class="ql-snow"><div class="ql-editor p-0">{!! html_entity_decode($halaman->konten) !!}</div></div>
		</div>
	</section>
	<!-- End Sample Area -->

@endsection

@section('css-extra')

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style type="text/css">
  /* Quill */
  .ql-editor h2, .ql-editor h3 {margin-bottom: 1rem!important; font-weight: 600!important;}
  .ql-editor p {margin-bottom: 1rem!important; line-height: 1.8!important;}
  .ql-editor ol {padding-left: 30px!important;}
  .ql-editor ol li {font-size: 14px!important; color: #74757f!important; padding-left: 5px!important;}
</style>

@endsection