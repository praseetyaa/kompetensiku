<?php $__env->startSection('content'); ?>

<!-- slider_area_start -->
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider d-flex align-items-center justify-content-center overlay" style="background-image: url('<?php echo e(asset('assets/images/default/slider-1.jpg')); ?>');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="slider_text">
                            <h3>Mari Bergabung Bersama Kami!</h3>
                            <p class="mb-3">Menjadi Praktisi Sumber Daya Manusia yang kompeten.</p>
                            <div class="col text-white">
                                <div class="row">
                                    <div class="col-md-6"><i class="fa fa-check mr-2"></i>Strategi dan Perencanaan SDM</div>
                                    <div class="col-md-6"><i class="fa fa-check mr-2"></i>Pengembangan Organisasi</div>
                                    <div class="col-md-6"><i class="fa fa-check mr-2"></i>Pembelajaran dan Pengembangan</div>
                                    <div class="col-md-6"><i class="fa fa-check mr-2"></i>Manajemen Talenta</div>
                                    <div class="col-md-6"><i class="fa fa-check mr-2"></i>Manajemen Karir</div>
                                    <div class="col-md-6"><i class="fa fa-check mr-2"></i>Manajemen Kinerja dan Renumerasi</div>
                                    <div class="col-md-6"><i class="fa fa-check mr-2"></i>Hubungan Industrial</div>
                                    <div class="col-md-6"><i class="fa fa-check mr-2"></i>Administrasi dan Informasi SDM</div>
                                </div>
                            </div>
                            <p>Segera daftar dan dapatkan berbagai pembelajaran dan tools SDM yang mendukung profesi Anda.</p>
                            <a href="/register<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>" class="boxed-btn3">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider d-flex align-items-center justify-content-center overlay" style="background-image: url('<?php echo e(asset('assets/images/default/slider-2.jpg')); ?>');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="slider_text">
                            <h3>Anda Praktisi SDM?</h3>
                            <p>Tingkatkan wawasan dan keterampilan profesional Anda dalam mengelola dan mengembangkan SDM dengan mengikuti E-Learning dan Online Course di BISA Management.</p>
                            <a href="/register<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>" class="boxed-btn3">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider d-flex align-items-center justify-content-center overlay" style="background-image: url('<?php echo e(asset('assets/images/default/slider-3.jpg')); ?>');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="slider_text">
                            <h3>Ikuti Program Mentoring SDM</h3>
                            <p>
                            Obrolan santai dan solusi praktis menyelesaikan masalah SDM di organisasi Anda bersama kami.
                            <br>
                            Setiap hari Senin
                            <br>
                            Pukul 09.00 - 11.00 WIB
                            <br>
                            Via Zoom
                            <br>
                            Bersama berbagai narasumber dari praktisi SDM.
                            </p>
                            <!-- <a href="/register<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>" class="boxed-btn3">Mulai</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->

<!-- about_area_start -->
<div class="about_area ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="about_thumbs">
                    <div class="large_img_1">
                        <img src="<?php echo e(asset('assets/images/others/about-1-fix.jpg')); ?>" alt=""> <!--assets/images/others/about-1.jpg-->
                    </div>
                    <div class="small_img_1">
                        <img src="<?php echo e(asset('assets/images/others/about-2-fix.jpg')); ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="about_info">
                    <div class="section_title mb-20px">
                        <h3>Selamat Datang</h3>
                        <div class="ql-snow"><div class="ql-editor p-0"><?php echo html_entity_decode($deskripsi->deskripsi); ?></div></div>
                    </div>
                    <a href="https://wa.me/<?php echo e(get_nomor_whatsapp()); ?>" class="boxed-btn3" target="_blank">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about_area_end -->

<div class="program_area">
    <div class="container">
        <div class="row align-items-center ">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="section_title text-center mb-55">
                    <h3>Program Pelatihan dan Sertifikasi Praktisi Sumber Daya Manusia</h3>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p> -->
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <h2>Level Staf</h2>
                <p>
                    <ol class="level-list">
                        <li>Staf Kompensasi dan Benefit</li>
                        <li>Staf Penggajian</li>
                        <li>Staf Renumerasi</li>
                        <li>Staf Administrasi Sumber Daya Manusia (SDM)</li>
                        <li>Staf Sumber Daya Manusia (SDM)</li>
                        <li>Staf Perencanaan Sumber Daya Manusia (SDM)</li>
                        <li>Staf Rekrutmen dan Seleksi (SRS)</li>
                        <li>Staf Manajemen Talenta (SMT)</li>
                    </ol>
                </p>
                <h2>Level Supervisor</h2>
                <p>
                    <ol class="level-list">
                        <li>Supervisor Pengadaan, Penyeleksian, dan Penempatan Sumber Daya Manusia (SPPPSDM)</li>
                        <li>Supervisor Pelatihan dan Pengembangan Sumber Daya Manusia (SPPSDM)</li>
                        <li>Supervisor Hubungan Industrial (SHI)</li>
                        <li>Supervisor Manajemen Kinerja dan Karir (SMKK)</li>
                        <li>Supervisor Manajemen Talenta (SMT)</li>
                    </ol>
                </p>
                <h2>Level Manajer</h2>
                <p>
                    <ol class="level-list">
                        <li>Manajer Sumber Daya Manusia (MSDM)</li>
                        <li>Manajer Human Capital (MHC)</li>
                        <li>Manajer Pengembangan Sumber Daya Manusia (PSDM)</li>
                        <li>Manajer Administrasi dan Personalia (MAP)</li>
                    </ol>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="service_area">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-12 col-md-12">
                <div class="section_title text-center mb-55">
                    <h3>Mengapa Kami?</h3>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p> -->
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php $__currentLoopData = $layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6">
                <div class="single_service">
                    <!-- <div class="service_thumb">
                        <img src="<?php echo e(asset('templates/br/img/service/1.png')); ?>" alt="">
                    </div> -->
                    <div class="service_content text-center">
                        <div class="icon">
                            <i class="<?php echo e($data->layanan_icon); ?>"></i>
                        </div>
                        <h3><?php echo e($data->layanan); ?></h3>
                        <div class="service-text">
                        <p><?php echo e($data->layanan_caption); ?></p>
                        </div>
                    </div>
                </div>
            </div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<!-- call_to_action_area  -->
<div class="call_to_action_area">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-12">
                <div class="section_title text-center">
                    <h3 class="text-white">Siap menjadi kompeten bersama Kami?</h3>
                    <a href="https://wa.me/<?php echo e(get_nomor_whatsapp()); ?>" class="boxed-btn3" target="_blank">Hubungi Kami</a>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /call_to_action_area  -->

<!-- testimonial_area  -->
<div class="testimonial_area  ">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-40 text-center">
                    <h3>
                        Klien yang sudah Kami bantu
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
					<?php $__currentLoopData = $mitra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12">
                                <div class="single_testmonial text-center">
						            <h4 class="mb-3"><?php echo e($data->nama_mitra); ?></h4>
                                    <img src="<?php echo e(asset('assets/images/mitra/'.$data->logo_mitra)); ?>" class="mb-3 mx-auto" alt="" style="max-height: 100px!important; width: auto!important;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /testimonial_area  -->

<!-- blog_area  -->
<div class="blog_area">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-12 col-md-12">
                <div class="section_title text-center mb-55">
                    <h3>Artikel terbaru</h3>
                </div>
            </div>
        </div>
        <div class="row">
			<?php $__currentLoopData = $artikel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6">
                <article class="blog_item">
                    <div class="blog_item_img">
                        <a href="/artikel/<?php echo e($data->blog_permalink); ?>">
                            <img class="card-img rounded-0" src="<?php echo e($data->blog_gambar != '' ? asset('assets/images/blog/'.$data->blog_gambar) : asset('assets/images/default/artikel.jpg')); ?>" alt="">
                        </a>
                    </div>

                    <div class="blog_details">
                        <a class="d-inline-block" href="/artikel/<?php echo e($data->blog_permalink); ?>">
                            <h2><?php echo e($data->blog_title); ?></h2>
                        </a>
                        <ul class="blog-info-link">
                            <li><i class="fa fa-calendar"></i> <?php echo e(date('d/m/Y', strtotime($data->blog_at))); ?></li>
                            <li><i class="fa fa-user"></i> <?php echo e($data->nama_user); ?></li>
                            <li><i class="fa fa-comments"></i> <?php echo e(count_comments($data->id_blog)); ?></li>
                        </ul>
                    </div>
                </article>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<!-- /blog_area  -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style type="text/css">
    .level-list li {list-style: decimal; margin-bottom: 5px; color: #575757;}
    .service_area .single_service .service_content {height: 370px;}
    .service-text {display: -webkit-box !important; -webkit-line-clamp: 7; -moz-line-clamp: 7; -ms-line-clamp: 7; -o-line-clamp: 7; line-clamp: 7; -webkit-box-orient: vertical; -ms-box-orient: vertical; -o-box-orient: vertical; box-orient: vertical; overflow: hidden; text-overflow: ellipsis;}
   /* Quill */
   .ql-editor h2, .ql-editor h3 {margin-bottom: 1rem!important; font-weight: 600!important;}
   .ql-editor p {margin-bottom: 1rem!important; line-height: 1.8!important;}
   .ql-editor ol {padding-left: 30px!important;}
   .ql-editor ol li {font-size: 14px!important; color: #74757f!important; padding-left: 5px!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/guest/br/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms-v2\resources\views/front/br/home.blade.php ENDPATH**/ ?>