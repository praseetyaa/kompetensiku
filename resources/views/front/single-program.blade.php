@extends('template/guest/main')

@section('title', 'Program | ')

@section('content')
<div id="program-content">
  <div class="container mt-3">
  	<nav aria-label="breadcrumb">
  	  <ol class="breadcrumb bg-white p-3 shadow-sm rounded-1">
  	    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="/program">Program</a></li>
        <li class="breadcrumb-item active" aria-current="page">
          
          <span v-for="item in items" v-if="item.id==1">@{{item.subtitle}}</span>
          
        </li>
  	  </ol>
  	</nav>
  </div>
  <section>
      <div class="bg-theme-2">
          <div class="container pt-0 pt-md-4 pb-4 mb-4 mb-lg-0">
            <div class="row">
              <div class="col-lg-8 order-2 order-lg-1 text-white">
                <span class="badge bg-theme-1 mb-3 p-2">E-Learning</span>
                <h2 class="mb-3">Lorem ipsum dolor sit amet</h2>
                <p>Oleh : John Seno<br> Terakhir diperbarui 21/02/2000</p>
                <a href="/login" class="btn btn-light">Ambil Pelatihan</a>
              </div>
              <div class="col-lg-4 order-1 order-lg-2 px-0 px-md-3">
                  <img class="img-fluid rounded mb-3 mb-lg-0" src="{{asset('assets/images/default/artikel.jpg') }}">
              </div>
            </div>
          </div>
      </div>
  </section>
  <section class="my-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-3 mb-lg-0">
          <div class="heading">
            <h5 class="font-weight-bold">Ringkasan</h5>
          </div>
          <div class="card rounded-2 border-0 shadow-sm">
            <div class="card-body">
              <div class="ql-snow">
                <div class="ql-editor">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card mb-3">
              <div class="card-body">
                  <h5 class="widget_title">Pelatihan Lainya</h5>
                  <a class="text-body" href="#">
                      <div class="d-flex">
                          <img class="rounded flex-shrink-0 me-3" width="70" src="{{asset('assets/images/default/artikel.jpg') }}" alt="post">
                          <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                      </div>
                  </a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@section('js-extra')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>
@endsection