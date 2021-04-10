

<?php $__env->startSection('content'); ?>

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
     <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/member">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- URL Referral -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- welcome text -->
            <div class="col-lg-12">
                <div class="alert alert-warning text-center shadow">
                    Selamat datang di Campus Digital, <span class="font-weight-bold"><?php echo e(Auth::user()->nama_user); ?></span>!
                </div>
            </div>
            <!-- welcome text -->
			<?php if(Auth::user()->status == 1): ?>
            <!-- column -->
            <div class="col-lg-12">
                <!-- card -->
                <div class="card shadow">
                    <div class="card-body">
                        <div class="m-t-20 m-b-20">
                            <div class="d-flex no-block align-items-center">
                                <div class="row">
                                    <div class="col-md-6 col-sm-9 col-12 mx-auto p-3 text-center border border-secondary bg-warning shadow">
                                        <h4>URL Referral Anda</h4>
                                        <p class="mb-0 h5"><a class="font-weight-bold" href="<?php echo e(URL::to('/')); ?>?ref=<?php echo e(Auth::user()->username); ?>" target="_blank"><?php echo e(URL::to('/')); ?>?ref=<?php echo e(Auth::user()->username); ?></a></p>
                                    </div>
                                    <div class="col-12 mt-4 text-center">
                                        <p class="h5">Promosikan URL Referral Anda dan dapatkan Komisi Sponsor sebesar <strong class="text-danger">Rp. <?php echo e(Auth::user()->role == 5 ? number_format(setMentorComission(),0,',','.') : number_format(setComission(),0,',','.')); ?></strong> setiap ada member baru yang bergabung melalui URL Anda. Tidak ada batasan jumlah member yang Anda sponsori, Anda bisa mensponsori puluhan, bahkan ratusan member.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-6">
                <!-- card -->
                <div class="card shadow">
                    <div class="card-body text-justify">
                        <h4 class="card-title">Apa itu Referral?</h4>
                        <div class="m-t-20 m-b-20">
                            <p>Referral adalah seseorang yang kita ajak (refer) dimana mereka mendaftar ke salah satu situs yang kita tawarkan. Setiap PTC akan memberikan alat kepada anggota untuk mempromosikan situs mereka kepada orang lain. Ini dapat berupa text link (URL) atau banner yang tentunya menggunakan kode script.</p>
                            <p>Jika orang yang diajak mendaftar melalui URL referral, maka kita biasanya kita akan mendapatkan komisi. Disini, kami memberikan komisi berupa uang sebesar <strong class="text-danger">Rp. <?php echo e(Auth::user()->role == 5 ? number_format(setMentorComission(),0,',','.') : number_format(setComission(),0,',','.')); ?></strong> setiap ada member baru yang bergabung melalui URL referral.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-6">
                <!-- card -->
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">Tips Sebelum Memulai</h4>
                        <div class="m-t-20 m-b-20">
                            <p class="mb-1">Berikut adalah tips sebelum memulai program referral:</p>
                            <ol>
                                <li>Pahami dan kuasai sistem produk secara baik.</li>
                                <li>Buatlah daftar calon prospek. Bisa dimulai dari orang terdekat Anda, atau bisa juga mitra Anda.</li>
                                <li>Promosikan URL Referral Anda melalui situs iklan baris, PPC (Pay-Per-Click), PTC (Pay-To-Click), atau situs-situs lain yang <em>trafficnya</em> tinggi.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
			<?php else: ?>
            <!-- column -->
            <div class="col-lg-6">
                <!-- card -->
                <div class="card shadow">
                    <div class="card-body text-justify">
                        <h4 class="card-title">Aktivasi Akun Anda</h4>
                        <div class="m-t-20 m-b-20">
                            <div class="alert alert-info">Kode pembayaran Anda adalah <strong><?php echo e($komisi->inv_komisi); ?></strong>. Kode ini akan digunakan saat Anda melakukan konfirmasi pembayaran.</div>
                            <p class="mb-1">Aktivasi akun Anda dengan melakukan pembayaran sejumlah <del>Rp. 499.000</del> <strong>Rp. <?php echo e(number_format($komisi->komisi_aktivasi,0,'.','.')); ?></strong> ke rekening berikut:</p>
                            <ol>
                                <?php $__currentLoopData = $default_rekening; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><strong><?php echo e($data->nama_platform); ?></strong> dengan nomor rekening <strong><?php echo e($data->nomor); ?></strong> a/n <strong><?php echo e($data->atas_nama); ?></strong>.</li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-6">
                <!-- card -->
                <div class="card shadow">
                    <div class="card-body text-justify">
                        <h4 class="card-title">Anda Sudah Membayar?</h4>
                        <div class="m-t-20 m-b-20">
                            <?php if($komisi->komisi_proof == ''): ?>
                            <p>Jika Anda sudah membayar, segera lakukan konfirmasi pembayaran <a href="#" class="font-weight-bold" id="btn-confirm">disini</a>.</p>
                            <!-- <p>Atau Anda juga bisa melakukan konfirmasi pembayaran dengan mengirimkan SMS ke nomor <strong>081234567890</strong> dengan format:<br><strong>CAMPUS [Nama Akun] [Kode Pembayaran] [Tanggal Pembayaran]</strong></p> -->
                            <?php else: ?>
                            <div class="alert alert-success">Anda sudah membayar dan melakukan konfirmasi pembayaran. Tunggu beberapa saat sampai pihak Admin memverifikasi konfirmasi pembayaran Anda.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
			<?php endif; ?>
        </div>
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <?php echo $__env->make('template/member/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<?php if(Auth::user()->status == 0): ?>
<!-- Modal Konfirmasi Pembayaran -->
<div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<form id="form-confirmation" method="post" action="member/konfirmasi-pembayaran" enctype="multipart/form-data">
					<?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label>Kode Pembayaran <span class="text-danger">*</span></label>
                        <input type="text" name="kode_pembayaran" class="form-control" placeholder="Masukkan Kode Pembayaran" value="<?php echo e($komisi->inv_komisi); ?>" readonly>
                    </div>
					<input type="file" name="foto" id="file" class="d-none" name="bukti_pembayaran" accept="image/*">
				</form>
                <button type="button" class="btn btn-md btn-primary" id="btn-upload">Upload Bukti Pembayaran</button>
				<img id="foto" class="img-thumbnail mt-3">
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-md btn-success" id="btn-submit-confirmation" disabled>Submit</button>
			</div>
        </div>
    </div>
</div>
<!-- End Modal Konfirmasi Pembayaran -->
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script>
	// Button Konfirmasi Pembayaran
    $(document).on("click", "#btn-confirm", function(e){
        e.preventDefault();
        $("#modalKonfirmasi").modal("show");
    });
	
	// Upload Bukti Pembayaran
	$(document).on("click", "#btn-upload", function(e){
        e.preventDefault();
		$("#file").trigger("click");
	});
	
	$(document).on("change", "#file", function(){
		readURL(this);
        $.trim($("input[name=kode_pembayaran]").val()) != '' || $.trim($("input[name=kode_pembayaran]").val()) != null ? $("#btn-submit-confirmation").removeAttr("disabled") : $("#btn-submit-confirmation").attr("disabled", "disabled");
	});
	
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#foto").attr("src",e.target.result).show();
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
	
	// Button Submit
    $(document).on("click", "#btn-submit-confirmation", function(e){
		e.preventDefault();
        $("#form-confirmation").submit();
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
	#foto {display: none; max-width: 350px;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/member/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-campusdigital/resources/views/dashboard/member/dashboard.blade.php ENDPATH**/ ?>