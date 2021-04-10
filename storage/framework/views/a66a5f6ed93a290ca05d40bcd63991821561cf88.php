

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
                <h4 class="page-title">Edit Paket</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/paket">Paket</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Paket</li>
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
            <!-- column -->
            <div class="col-lg-12">
                <!-- card -->
                <div class="card shadow">
                    <h5 class="card-title border-bottom">Edit Paket</h5>
                    <div class="card-body">
                        <form id="form" method="post" action="/admin/paket/update" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

							<input type="hidden" name="id" value="<?php echo e($paket->id_paket); ?>">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Nama Paket <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_paket" class="form-control <?php echo e($errors->has('nama_paket') ? 'is-invalid' : ''); ?>" value="<?php echo e($paket->nama_paket); ?>" placeholder="Masukkan Nama Paket">
                                    <?php if($errors->has('nama_paket')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('nama_paket'))); ?></small>
                                    <?php endif; ?>
                                </div>
								<div class="form-group col-md-6">
									<label>Harga Paket <span class="text-danger">*</span></label>
									<input type="text" name="harga_paket" class="form-control number-only thousand-format <?php echo e($errors->has('harga_paket') ? 'is-invalid' : ''); ?>" value="<?php echo e(number_format($paket->harga_paket,0,'.','.')); ?>" placeholder="Masukkan Harga Paket">
									<?php if($errors->has('harga_paket')): ?>
									<small class="text-danger"><?php echo e(ucfirst($errors->first('harga_paket'))); ?></small>
									<?php endif; ?>
								</div>
                                <div class="form-group col-md-6">
                                    <label>Bisa Ambil Komisi? <span class="text-danger">*</span></label>
									<div class="row">
										<div class="col-auto">
											<div class="form-check form-check-inline">
												<input class="form-check-input" name="bisa_ambil_komisi" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" <?php echo e($paket->bisa_ambil_komisi == 1 ? 'checked' : ''); ?>>
												<label class="form-check-label" for="inlineRadio1">Ya</label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" name="bisa_ambil_komisi" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0" <?php echo e($paket->bisa_ambil_komisi == 0 ? 'checked' : ''); ?>>
												<label class="form-check-label" for="inlineRadio2">Tidak</label>
											</div>
										</div>
									</div>
                                    <?php if($errors->has('bisa_ambil_komisi')): ?>
                                    <div><small class="text-danger"><?php echo e(ucfirst($errors->first('bisa_ambil_komisi'))); ?></small></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="border-top">
                        <button id="btn-submit" type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- column -->
        </div>
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <?php echo $__env->make('template/admin/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script type="text/javascript">
    // Button Submit
    $(document).on("click", "#btn-submit", function(e){
        $("#form").submit();
    });

    // Input Hanya Nomor
    $(document).on("keypress", ".number-only", function(e){
        var charCode = (e.which) ? e.which : e.keyCode;
        if (charCode >= 48 && charCode <= 57) { 
            // 0-9 only
            return true;
        }
        else{
            return false;
        }
    });
    // End Input Hanya Nomor

    // Input Format Ribuan
    $(document).on("keyup", ".thousand-format", function(){
        var value = $(this).val();
        $(this).val(formatRibuan(value, ""));
    });
    // End Input Format Ribuan

    // Functions
    function formatRibuan(angka, prefix){
        var number_string = angka.replace(/\D/g,'');
        number_string = (number_string.length > 1) ? number_string.replace(/^(0+)/g, '') : number_string;
        var split = number_string.split(',');
        var sisa = split[0].length % 3;
        var rupiah = split[0].substr(0, sisa);
        var ribuan = split[0].substr(sisa).match(/\d{3}/gi);
     
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
     
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return rupiah;
    }
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
    .border-top, .border-bottom {padding: 1.25rem;}
    .form-control {border-color: #caccce;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-referral/resources/views/paket/admin/edit.blade.php ENDPATH**/ ?>