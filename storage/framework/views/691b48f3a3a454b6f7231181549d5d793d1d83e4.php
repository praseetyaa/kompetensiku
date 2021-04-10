
    <!-- footer_start  -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="<?php echo e(asset('assets/images/logo/'.get_logo())); ?>" width="200" alt="">
                                </a>
                            </div>
                            <!-- <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-dribbble"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div> -->

                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Menu
                            </h3>
                            <ul class="links">
							    <?php $__currentLoopData = $global_halaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $halaman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="/page/<?php echo e($halaman->halaman_permalink); ?><?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>"><?php echo e($halaman->halaman_title); ?></a></li>
							    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Kategori
                            </h3>
                            <ul class="links">
							    <?php $__currentLoopData = $global_kategori_artikel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori_artikel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="/kategori/<?php echo e($kategori_artikel->slug); ?><?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>"><?php echo e($kategori_artikel->kategori); ?></a></li>
							    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Hubungi Kami
                            </h3>
                            <ul class="links">
                                <li><i class="fa fa-map-marker mr-2"></i><?php echo e(get_alamat()); ?></li>
                                <li><i class="fab fa-whatsapp mr-2"></i><?php echo e(get_nomor_whatsapp()); ?></li>
                                <li><i class="fab fa-instagram mr-2"></i><?php echo e(get_akun_instagram()); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> <?php echo e(get_website_name()); ?>. All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_end  --><?php /**PATH /var/www/vhosts/bisa.co.id/public_html/bisa-v2/resources/views/template/guest/br/_footer.blade.php ENDPATH**/ ?>