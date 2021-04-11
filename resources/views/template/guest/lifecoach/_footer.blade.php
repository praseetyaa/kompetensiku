<footer class="footer">
	<div class="container px-lg-5">
		<div class="row">
			<div class="col-md-4 pt-5">
				<img src="{{ asset('assets/images/logo/'.get_logo()) }}" class="img-fluid px-4">
			</div>
			<div class="col-md-8 pt-5">
				<div class="row">
					<div class="col-md-4">
						<h2 class="footer-heading">Menu</h2>
						<ul class="list-unstyled">
							@foreach($global_halaman as $halaman)
							<li><a href="/page/{{ $halaman->halaman_permalink }}{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}" class="py-1 d-block">{{ $halaman->halaman_title }}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-md-4">
						<h2 class="footer-heading">Kategori</h2>
						<ul class="list-unstyled">
							@foreach($global_kategori_artikel as $kategori_artikel)
							<li><a href="/kategori/{{ $kategori_artikel->slug }}{{ Session::get('ref') != null ? '?ref='.Session::get('ref') : '' }}" class="py-1 d-block">{{ $kategori_artikel->kategori }}</a></li>
							@endforeach
						</ul>
					</div>
					<!-- <div class="col-md-12 mb-md-0 text-center" style="margin-top: 3rem;">
						<p class="text-white mb-0"><i class="fa fa-map-marker position-absolute" style="font-size: 22px;"></i><span style="margin-left: 1.75rem!important;">{{ get_alamat() }}</span></p>
						<ul class="footer-profile">
							<li></li>
							<li><i class="fa fa-envelope position-absolute" style="font-size: 22px;"></i><span>{{ get_email() }}</span></li>
							<li><i class="fa fa-phone position-absolute" style="font-size: 22px;"></i><span>{{ get_nomor_telepon() }}</span></li>
							<li><i class="fab fa-whatsapp position-absolute" style="font-size: 22px;"></i><span>{{ get_nomor_whatsapp() }}</span></li>
							@if(get_akun_facebook() != '')<li><i class="fab fa-facebook position-absolute" style="font-size: 22px;"></i><span>{{ get_akun_facebook() }}</span></li>@endif
							@if(get_akun_instagram() != '')<li><i class="fab fa-instagram position-absolute" style="font-size: 22px;"></i><span>{{ get_akun_instagram() }}</span></li>@endif
							@if(get_akun_twitter() != '')<li><i class="fab fa-twitter position-absolute" style="font-size: 22px;"></i><span>{{ get_akun_twitter() }}</span></li>@endif
						</ul>
					</div> -->
				</div>
			</div>
			<div class="col-md-12 pt-5">
				<div class="row mt-md-5">
					<div class="col-md-12 text-center">
						<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> <strong>{{ get_website_name() }}</strong>. All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<!-- WhatsApp Button -->
<div style="bottom:25px; position:fixed; right:10px; z-index:999; border:#000000 0px solid;">
	<a href="#" onClick="window.open('https://api.whatsapp.com/send?phone={{ get_nomor_whatsapp() }}', '_blank')">
		<img src=" {{ asset('assets/images/others/chat-wa.png') }}" class="img-responsive" style="max-width: 200px;">
	</a>
</div>
<!-- WhatsApp Button End -->