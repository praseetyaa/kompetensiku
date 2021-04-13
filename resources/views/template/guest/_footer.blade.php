<footer class="footer bg-theme-1 text-light py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <a href="#">
                    <img src="{{ asset('assets/images/logo/'.get_logo()) }}" width="200" alt="logo" style="filter: brightness(0) invert(1);">
                </a>
            </div>
            <div class="col-md-6 col-lg-2">
                <h5>Menu</h5>
                <ul class="list-unstyled">
				    @foreach($global_halaman as $halaman)
                    <li><a class="link-secondary text-decoration-none" href="/page/{{ $halaman->halaman_permalink }}{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">{{ $halaman->halaman_title }}</a></li>
				    @endforeach
                </ul>
            </div>
            <div class="col-md-6 col-lg-2">
                <h5>Kategori</h5>
                <ul class="list-unstyled">
				    @foreach($global_kategori_artikel as $kategori_artikel)
                    <li><a class="link-secondary text-decoration-none" href="/kategori/{{ $kategori_artikel->slug }}{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}">{{ $kategori_artikel->kategori }}</a></li>
				    @endforeach
                </ul>
            </div>
            <div class="col-md-6 col-lg-4">
                <h5>Hubungi Kami</h5>
                <ul class="list-unstyled">
                    <li><i class="fa fa-map-marker position-absolute pt-1"></i><span class="ms-4">{{ get_alamat() }}</span></li>
                    <li><i class="fab fa-whatsapp position-absolute pt-1"></i><span class="ms-4">{{ get_nomor_whatsapp() }}</span></li>
                    <li><i class="fab fa-instagram position-absolute pt-1"></i><span class="ms-4">{{ get_akun_instagram() }}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container pt-5">
        <hr>
        <p class="m-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script> {{ get_website_name() }}. All rights reserved</p>
    </div>
</footer>