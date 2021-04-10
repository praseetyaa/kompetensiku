<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
	<!--<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:400,700" />-->
	<title>Sertifikat</title>
	<link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo/logo.jpg')); ?>">
	<style type="text/css">
		@font-face {font-family: 'Lato-Regular'; src: url(<?php echo e(asset('assets/fonts/Lato-Regular.ttf')); ?>);}
		@font-face {font-family: 'Lato-Bold'; src: url(<?php echo e(asset('assets/fonts/Lato-Bold.ttf')); ?>);}
		@font-face {font-family: 'Lato-Bold-Italic'; src: url(<?php echo e(asset('assets/fonts/Lato-Bold-Italic.ttf')); ?>);}
		
		@page  {margin: 0;}
		body {font-family: 'Lato-Regular'; font-size: 18.5px; background-image: url(<?php echo e(asset('assets/images/sertifikat/template-sertifikat-96.jpg')); ?>); background-position: center center; background-repeat: repeat-x; background-size: cover;}
		#nomor-seri {font-size: 12px; position: absolute; top: 5px; left: 15px;}
		#nomor-sertifikat {font-size: 29px; position: absolute; top: 242px; left: 88px; width: 950px; text-align: center;}
		#nama {font-family: 'Lato-Bold-Italic'; font-size: 58px; position: absolute; top: 325px; left: 88px; width: 950px; text-align: center;}
		#tipe {font-family: 'Lato-Bold'; font-size: 18px; position: absolute; top: 440px; left: 88px; width: 950px; text-align: center;}
		#deskripsi {position: absolute; top: 488px; left: 88px; width: 950px; line-height: 20px;}
		#judul {font-family: 'Lato-Bold';}
		#text-mengetahui {position: absolute; top: 575px; left: 88px;}
		#text-direktur {position: absolute; top: 597px; left: 88px;}
		#direktur {position: absolute; top: 705px; left: 88px;}
		#tanggal {position: absolute; top: 575px; left: 790px;}
		#text-trainer {position: absolute; top: 597px; left: 790px;}
		#trainer {position: absolute; top: 705px; left: 790px;}
		#line-1 {position: absolute; top: 712px; left: 85px; width: 250px; border-color: #333; margin: 0; border-width: 1.25px;}
		#line-2 {position: absolute; top: 712px; left: 787px; width: 250px; border-color: #333; margin: 0; border-width: 1.25px;}
	</style>
</head>
<body>
	<div id="nomor-seri">Nomor Seri: 123-456-7890</div>
	<div id="nomor-sertifikat">Nomor: 01/Webinar/CD/2020</div>
	<div id="nama">Aji Fatur</div>
	<div id="tipe">Sebagai Peserta</div>
	<div id="deskripsi">Acara webinar dengan tema <span id="judul">"Cuman Di Rumah Tapi Dapat Penghasilan, Yuk Bikin Blog"</span>. Diselenggarakan oleh Campus Digital.</div>
	<div id="text-mengetahui">Mengetahui,</div>
	<div id="text-direktur">Direktur Campus Digital</div>
	<div id="direktur">Faris Fanani</div>
	<div id="tanggal">Semarang, 23 Juli 2020</div>
	<div id="text-trainer">Trainer</div>
	<div id="trainer">Dimas Ady Nugraha</div>
	<hr id="line-1">
	<hr id="line-2">
</body>
</html><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-campusdigital/resources/views/sertifikat/admin/pdf.blade.php ENDPATH**/ ?>