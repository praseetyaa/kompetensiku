
    <!-- footer_start  -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="{{ asset('assets/images/logo/'.get_logo()) }}" width="200" alt="">
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
							    @foreach($global_halaman as $halaman)
                                <li><a href="/page/{{ $halaman->halaman_permalink }}{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">{{ $halaman->halaman_title }}</a></li>
							    @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Kategori
                            </h3>
                            <ul class="links">
							    @foreach($global_kategori_artikel as $kategori_artikel)
                                <li><a href="/kategori/{{ $kategori_artikel->slug }}{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">{{ $kategori_artikel->kategori }}</a></li>
							    @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Hubungi Kami
                            </h3>
                            <ul class="links">
                                <li><i class="fa fa-map-marker mr-2"></i>{{ get_alamat() }}</li>
                                <li><i class="fab fa-whatsapp mr-2"></i>{{ get_nomor_whatsapp() }}</li>
                                <li><i class="fab fa-instagram mr-2"></i>{{ get_akun_instagram() }}</li>
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
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> {{ get_website_name() }}. All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_end  -->