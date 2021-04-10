

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
                <h4 class="page-title">Tambah Rekening</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/member">Home</a></li>
                            <li class="breadcrumb-item"><a href="/member/rekening">Rekening</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Rekening</li>
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
                    <h5 class="card-title border-bottom">Tambah Rekening</h5>
                    <div class="card-body">
                        <form id="form" method="post" action="/member/rekening/store">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Platform <span class="text-danger">*</span></label>
									<select name="platform" class="form-control <?php echo e($errors->has('platform') ? 'is-invalid' : ''); ?>">
										<option value="" disabled selected>--Pilih Platform--</option>
										<optgroup label="Bank">
											<?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($data->id_platform); ?>" <?php echo e(old('platform') == $data->id_platform ? 'selected' : ''); ?>><?php echo e($data->nama_platform); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</optgroup>
										<optgroup label="Fintech">
											<?php $__currentLoopData = $fintech; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($data->id_platform); ?>" <?php echo e(old('platform') == $data->id_platform ? 'selected' : ''); ?>><?php echo e($data->nama_platform); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</optgroup>
									</select>
                                    <?php if($errors->has('platform')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('platform'))); ?></small>
                                    <?php endif; ?>
                                </div>
								<div class="form-group col-md-6">
									<label>Nomor <span class="text-danger">*</span></label>
									<input type="text" name="nomor" class="form-control number-only <?php echo e($errors->has('nomor') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('nomor')); ?>" placeholder="Masukkan Nomor">
									<?php if($errors->has('nomor')): ?>
									<small class="text-danger"><?php echo e(ucfirst($errors->first('nomor'))); ?></small>
									<?php endif; ?>
								</div>
								<div class="form-group col-md-6">
									<label>Atas Nama <span class="text-danger">*</span></label>
									<input type="text" name="atas_nama" class="form-control <?php echo e($errors->has('atas_nama') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('atas_nama')); ?>" placeholder="Masukkan Nama">
									<?php if($errors->has('atas_nama')): ?>
									<small class="text-danger"><?php echo e(ucfirst($errors->first('atas_nama'))); ?></small>
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
    })

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
	#platform {width: 200px; height: 250px; overflow-y: scroll; overflow-x: hidden;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/member/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-referral/resources/views/rekening/member/create.blade.php ENDPATH**/ ?>