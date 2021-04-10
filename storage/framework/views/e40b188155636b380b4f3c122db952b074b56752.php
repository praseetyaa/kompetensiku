

<?php $__env->startSection('content'); ?>

<!-- Hero Section end -->
<section class="hero-section">
  <div class="container text-center text-lg-left h-100">
    <div class="row h-100">
      <div class="col-lg-12 my-auto">
        <div class="hs-text">
          	<h2 data-aos="fade-down" data-aos-duration="1000">Let's Join Us!</h2>
		  	<h3 data-aos="fade-down" data-aos-duration="1500"><span class="text-warning">Digital Technology & Business Class</span></h3>
			<div class="row">
				<div class="col-md-6"><p data-aos="fade-down" data-aos-duration="2000"><i class="fa fa-check mr-2"></i>Digital Marketing</p></div>
				<div class="col-md-6"><p data-aos="fade-down" data-aos-duration="2000"><i class="fa fa-check mr-2"></i>Programmer</p></div>
				<div class="col-md-6"><p data-aos="fade-down" data-aos-duration="2000"><i class="fa fa-check mr-2"></i>Web Developer</p></div>
				<div class="col-md-6"><p data-aos="fade-down" data-aos-duration="2000"><i class="fa fa-check mr-2"></i>Game Developer</p></div>
				<div class="col-md-6"><p data-aos="fade-down" data-aos-duration="2000"><i class="fa fa-check mr-2"></i>Operator Komputer</p></div>
				<div class="col-md-6"><p data-aos="fade-down" data-aos-duration="2000"><i class="fa fa-check mr-2"></i>Multimedia</p></div>
				<div class="col-md-6"><p data-aos="fade-down" data-aos-duration="2000"><i class="fa fa-check mr-2"></i>Graphic Designer</p></div>
			</div>
			<p data-aos="fade-down" data-aos-duration="2000" style="margin-bottom: 20px">Mari bergabung bersama kami untuk mendapatkan ilmunya!</p>
			<p data-aos="fade-down" data-aos-duration="2500"><a href="/register<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>" class="btn-register-2">Daftar</a></p>
        </div>
      </div>
    </div>
  </div>
  <div class="hero-slider owl-carousel">
	  <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	<div class="hs-item set-bg" data-setbg="<?php echo e(asset('assets/images/slider/'.$data->slider)); ?>"></div>
	  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</section>
<!-- Hero Section end -->

<!-- Info Section -->
<section class="info-section spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 text-center mb-4">
        <img src="<?php echo e(asset('assets/images/others/undraw_marketing_v0iu.svg')); ?>" style="max-width: 80%;" alt="" data-aos="fade-down" data-aos-duration="3000">
      </div>
      <div class="col-lg-7">
        <div class="info-text" data-aos="fade-down" data-aos-duration="3000">
          <h2 class="mb-4">Privat dan Kursus Internet Marketing</h2>
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h4 class="mb-0">
                  <button class="btn btn-link-primary text-justify font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    ANDA PEGAWAI, KARYAWAN, PENGUSAHA, ATAU SIAPAPUN YANG INGIN MENAMBAH PENGHASILAN?
                  </button>
                </h4>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body text-justify">
                  Kami ada solusinya!! Belajar Online Marketing bersama kami di Campus Digital, di program Kursus Digital Marketing. Jadikan Bisnis Online sebagai sumber penghasilan Anda!!
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h4 class="mb-0">
                  <button class="btn btn-link-primary text-justify font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    ANDA INGIN BELAJAR BISNIS ONLINE TAPI TIDAK CUKUP WAKTU?
                  </button>
                </h4>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body text-justify">
                  Kami siapkan SOLUSInya!!! Kursus Digital Marketing yang kami adakan ini sudah kita siapkan untuk Anda yang sibuk. Pegawai, Karyawan, Mahasiswa, atau siapapun yang memiliki keterbatasan waktu. Kita desain sederhana tapi sangat efektif.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h4 class="mb-0">
                  <button class="btn btn-link-primary text-justify font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    ANDA INGIN USAHA SAMBILAN, TAPI TIDAK PUNYA CUKUP WAKTU? ATAU MALAH TIDAK CUKUP MODAL?
                  </button>
                </h4>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body text-justify">
                  Campus Digital punya jawabannya!!! Bisnis Online. Bisa dikerjakan paruh waktu dan modal yang relatif terjangkau. Dan bisa dikerjakan siapapun dan di manapun.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingFour">
                <h4 class="mb-0">
                  <button class="btn btn-link-primary text-justify font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    ANDA BINGUNG KEPADA SIAPA BELAJAR ONLINE MARKETING? APAKAH BELAJAR ONLINE MARKETING HARUS MAHAL?
                  </button>
                </h4>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body text-justify">
                  Tidak usah BINGUNG!! Pengajar di Kursus Digital Marketing ini merupakan pengajar pilihan. Merupakan mentor dan supervisor terpilih dari Campus Digital. Pengajar kami bukan hanya mumpuni secara TEORI tapi juga bisnis onlinenya berjalan dan terbukti MENGHASILKAN.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Info Section end -->

<!-- CTA Section end -->
<section class="cta-section set-bg" data-setbg="<?php echo e(asset('templates/loans2go/img/cta-bg.jpg')); ?>">
  <div class="container">
    <h2 data-aos="fade-down" data-aos-duration="1500">Materi yang Diajarkan</h2>
    <h5 data-aos="fade-down" data-aos-duration="1500">Materi Internet Marketing disampaikan oleh Praktisi Bisnis Online dan Trainer di Campus Digital.</h5>
    <a data-aos="fade-down" data-aos-duration="1500" href="/beasiswa<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>" class="site-btn sb-big">Lihat Selengkapnya</a>
  </div>
</section>
<!-- CTA Section end -->

<!-- Why Section end -->
<section class="why-section spad">
  <div class="container">
<!--     <div class="text-center mb-5 pb-4">
      <h2>Why Choose us?</h2>
    </div> -->
    <div class="row">
      <div class="col-md-4" data-aos="fade-down" data-aos-duration="1500">
        <div class="icon-box-item text-center text-sm-left">
          <div class="ib-icon mx-auto ml-sm-0 mr-sm-4">
            <i class="flaticon-004-assistance"></i>
          </div>
          <div class="ib-text">
            <h5>Riset</h5>
            <p>Bagaimana cara untuk melakukan riset pasar dan produk.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-down" data-aos-duration="1500">
        <div class="icon-box-item text-center text-sm-left">
          <div class="ib-icon mx-auto ml-sm-0 mr-sm-4">
            <i class="flaticon-024-laptop"></i>
          </div>
          <div class="ib-text">
            <h5>Social Media Marketing</h5>
            <p>Bagaimana menggunakan social media untuk aktivitas marketing.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-down" data-aos-duration="1500">
        <div class="icon-box-item text-center text-sm-left">
          <div class="ib-icon mx-auto ml-sm-0 mr-sm-4">
            <i class="flaticon-032-placeholder"></i>
          </div>
          <div class="ib-text">
            <h5>Marketplace</h5>
            <p>Bagaimana berjualan menggunakan marketplace.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-down" data-aos-duration="2500">
        <div class="icon-box-item text-center text-sm-left">
          <div class="ib-icon mx-auto ml-sm-0 mr-sm-4">
            <i class="flaticon-006-smartphone-2"></i>
          </div>
          <div class="ib-text">
            <h5>FB/IG Ads</h5>
            <p>Bagaimana beriklan di Facebook dan Instagram.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-down" data-aos-duration="2500">
        <div class="icon-box-item text-center text-sm-left">
          <div class="ib-icon mx-auto ml-sm-0 mr-sm-4">
            <i class="flaticon-016-smartphone"></i>
          </div>
          <div class="ib-text">
            <h5>SEO Dasar</h5>
            <p>Bagaimana agar website nomor satu di halaman Search Engine.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-down" data-aos-duration="2500">
        <div class="icon-box-item text-center text-sm-left">
          <div class="ib-icon mx-auto ml-sm-0 mr-sm-4">
            <i class="flaticon-037-responsive"></i>
          </div>
          <div class="ib-text">
            <h5>Desain Web</h5>
            <p>Bagaimana membuat website dan landing page untuk promosi.</p>
          </div>
        </div>
      </div>
    </div>
<!--     <div class="text-center pt-3">
      <a href="/register<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>" class="site-btn sb-big">Daftar Sekarang!</a>
    </div> -->
  </div>
</section>
<!-- Why Section end -->

<!-- Help Section -->
<section class="help-section spad">
  <div class="container">
    <div class="feature-item">
      <div class="row">
        <div class="col-lg-6 text-center mb-4">
          <img src="<?php echo e(asset('assets/images/others/meeting.png')); ?>" style="max-width: 80%;" alt="" data-aos="fade-down" data-aos-duration="1500">
        </div>
        <div class="col-lg-6">
          <div class="feature-text">
            <h2 data-aos="fade-down" data-aos-duration="2000" class="text-white text-center text-lg-left">Program Beasiswa Campus Digital</h2>
            <p data-aos="fade-down" data-aos-duration="2000" class="text-light text-justify">Telah dibuka kembali Program Beasiswa Belajar Digital Marketing di Campus Digital. Gabung Segera!!!</p>
            <a data-aos="fade-down" data-aos-duration="2000" href="/beasiswa<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>" class="btn-link-secondary">Detail dan Persyaratan <img src="<?php echo e(asset('templates/loans2go/img/arrow.png')); ?>" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Help Section end -->

<!-- Feature Section -->
<section class="feature-section spad">
  <div class="container">
    <div class="text-center mb-5 pb-4">
      <h2 data-aos="fade-down" data-aos-duration="1500">Mentor Kami</h2>
    </div>
    <div class="feature-item">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-theme" id="mentor">
			  <?php $__currentLoopData = $mentor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="text-center" data-aos="fade-down" data-aos-duration="1500">
				  <img src="<?php echo e(asset('assets/images/mentor/'.$data->foto_mentor)); ?>" class="mb-3 mx-auto" style="width: 150px!important; border-radius: 50%!important; border: 2px solid #340369;">
				  <div class="h5"><?php echo e($data->nama_mentor); ?></div>
				  <p><?php echo e($data->bidang_mentor); ?></p>
				</div>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Feature Section end -->

<!-- Feature Section -->
<section class="feature-section spad" style="background-color: #eeeeee!important;">
  <div class="container">
    <div class="text-center mb-5 pb-4">
      <h2 data-aos="fade-down" data-aos-duration="1500">Mitra Kami</h2>
    </div>
    <div class="feature-item">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-theme" id="mitra">
			  <?php $__currentLoopData = $mitra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="text-center" data-aos="fade-down" data-aos-duration="1500" style="height: 150px">
				  <p><?php echo e($data->nama_mitra); ?></p>
				  <img src="<?php echo e(asset('assets/images/mitra/'.$data->logo_mitra)); ?>" class="mb-3 mx-auto" style="max-height: 100px; width: auto!important;">
				</div>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Feature Section end -->


<!-- CTA Section end -->
<section class="cta-section set-bg" data-setbg="<?php echo e(asset('templates/loans2go/img/score-bg.jpg')); ?>">
  <div class="container">
    <h2 class="text-white" data-aos="fade-down" data-aos-duration="1500">Hubungi Kami</h2>
    <h5 data-aos="fade-down" data-aos-duration="1500" style="color: #9e9fa5;">Daftar privat kursus internet marketing sekarang, atau hubungi kami untuk info lebih lanjut.</h5>
    <a data-aos="fade-down" data-aos-duration="1500" href="#" onClick="window.open('https://api.whatsapp.com/send?phone=62816343742&text=Halo Campus Digital, saya butuh informasi tentang layanan Campus Digital...', '_blank')" class="site-btn sb-whatsapp sb-big"><i class="fa fa-whatsapp mr-2" style="font-size: 20px;"></i> Hubungi Kami via WhatsApp</a>
  </div>
</section>
<!-- CTA Section end -->

<!-- Feature Section -->
<section class="feature-section spad">
  <div class="container">
    <div class="text-center mb-5 pb-4">
      <h2 data-aos="fade-down" data-aos-duration="1500">Testimoni</h2>
    </div>
    <div class="feature-item">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-theme" id="testimoni">
            <div class="card">
              <div class="card-body" data-aos="fade-down" data-aos-duration="1500">
                <p>Pembelajaran di kelas ini sangat menyenangkan karena metode diajari step by step sehingga saya mudah sekali memahami.</p>
                <h5><i class="fa fa-user mr-2"></i> Adiyatma</h5>
              </div>      
            </div>
            <div class="card shadow" data-aos="fade-down" data-aos-duration="1500">
              <div class="card-body">
                <p>Mentornya sabar mengajari kita-kita yang masih pemula sekali hingga bisa. Saya sarankan bila ingin bisa marketing online mengikuti kelas ini.</p>
                <h5><i class="fa fa-user mr-2"></i> Mila</h5>
              </div>      
            </div>
            <div class="card shadow" data-aos="fade-down" data-aos-duration="1500">
              <div class="card-body">
                <p>Setelah mengikuti kelas ini saya bisa memahami A sampai Z bagaimana memasarkan produk online, diajari secara teknis dan komplit.</p>
                <h5><i class="fa fa-user mr-2"></i> Dafid</h5>
              </div>      
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Feature Section end -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script type="text/javascript">
  $(document).ready(function(){
	 $('.hero-slider').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		mouseDrag: true,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		items: 1,
		autoplay: false
	});
	  
    $('#mentor').owlCarousel({
      loop:true,
      autoplay:true,
      autoplayTimeout:2000,
      autoplayHoverPause:true,
      margin:10,
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
              nav:false,
              loop:true,
          },
          576:{
              items:2,
              nav:false,
              loop:true,
          },
          768:{
              items:3,
              nav:false,
              loop:true,
          },
          992:{
              items:5,
              nav:false,
              loop:false,
              loop:true,
          }
      }
    });
  });

  $(document).ready(function(){
    $("#mitra").owlCarousel({
      loop:true,
      autoplay:true,
      autoplayTimeout:2000,
      autoplayHoverPause:true,
      margin:30,
	  dots:true,
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
          },
          576:{
              items:2,
          },
          768:{
              items:3,
          },
          992:{
              items:4,
          }
      }
    });
  });

  $(document).ready(function(){
    $('#testimoni').owlCarousel({
      loop:true,
      autoplay:true,
      autoplayTimeout:2000,
      autoplayHoverPause:true,
      margin:10,
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
              nav:true,
              loop:true,
          },
          576:{
              items:2,
              nav:false,
              loop:true,
          },
          768:{
              items:3,
              nav:false,
              loop:true,
          },
      }
    });
  });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
	#popupModal .close {position: absolute; right: -15px; top: -15px; background-color: #340369; color: #fdd100; width: 25px; height: 25px; opacity: 1!important;}
	.hero-section {padding-top: 0; padding-bottom: 0; height: 500px;}
	.hs-text {padding-top: 0; padding-right: 0;}
	.hs-text h2 {font-size: 70px; margin-bottom: 0;}
	.hs-text h3 {font-size: 55px; margin-bottom: 0;}
	.hs-text p {font-size: 20px; margin-bottom: 0; margin-left: 20px;}
	@media  only screen and (max-width: 767px) {
		.hs-text {padding-top: 0; margin-bottom: 0;}
		.hs-text h2 {font-size: 50px; margin-bottom: 0;}
		.hs-text h3 {font-size: 35px; margin-bottom: 0;}
		.hs-text p {margin-left: 0;}
	}
	@media  only screen and (min-width: 768px) and (max-width: 991px) {
		.hs-text {padding-top: 0; margin-bottom: 0;}
		.hs-text h2 {font-size: 60px; margin-bottom: 0;}
		.hs-text h3 {font-size: 45px; margin-bottom: 0;}
		.hs-text p {margin-left: 0;}
	}
	.hero-section {border-top: 5px solid #fdd100!important;}
	.hero-section .owl-dots {display: none!important;}
	.help-section {background-color: #46157a;}
	.accordion .card {border-width: 0; border-bottom: 1px solid #e5e5e5!important;}
	.accordion .card .card-header {background-color: rgba(0,0,0,0); padding-left: .5rem; padding-right: .5rem;}
	.feature-text {padding-top: 0;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/guest/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-v3/resources/views/front/home.blade.php ENDPATH**/ ?>