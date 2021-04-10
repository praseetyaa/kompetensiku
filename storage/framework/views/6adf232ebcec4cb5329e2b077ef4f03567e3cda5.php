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
                <h4 class="page-title">Komisi</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/member">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Komisi</li>
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
            <div class="col-lg-6">
                <!-- card -->
                <div class="card shadow">
                    <h5 class="card-title border-bottom">Ambil Komisi</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-9 col-12 mx-auto p-3 text-center border border-secondary bg-warning shadow">
                                <h5>Total Komisi Anda Saat Ini</h5>
                                <p class="mb-0 h3 text-primary font-weight-bold">Rp. <?php echo e(number_format(Auth::user()->komisi,0,',','.')); ?></p>
                            </div>
                        </div>
                        <form id="form" class="mt-5" method="get">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Withdrawal <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" name="withdrawal" class="form-control number-only thousand-format" placeholder="Masukkan nominal withdrawal yang akan diambil">
                                    </div>
                                    <div class="row mt-1">
                                        <!-- <small class="col-12 text-danger">Message</small> -->
                                        <small class="col-12 text-muted">Minimum nominal withdrawal yang dapat diambil adalah Rp. 150.000</small>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label>Rekening <span class="text-danger">*</span></label>
                                    <select class="form-control" name="rekening">
                                        <option value="" disabled selected>--Pilih--</option>

                                    </select>
                                    <div class="row mt-1">
                                        <!-- <small class="col-12 text-danger">Message</small> -->
                                        <small class="col-12 text-muted">Komisi akan ditransfer ke rekening ini</small>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="border-top">
                        <button id="btn-submit" type="submit" class="btn btn-success">Kirim Komisi Saya</button>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-6">
                <!-- card -->
                <div class="card shadow">
                    <h5 class="card-title border-bottom">Arsip Komisi</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-arsip-komisi" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="40">No.</th>
                                        <th width="100">Tanggal</th>
                                        <th>Nama</th>
                                        <th width="100">Komisi (Rp.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                        <td><?php echo e(date('Y-m-d', strtotime($user->created_at))); ?></td>
                                        <td><?php echo e($user->nama_user); ?></td>
                                        <td align="right">75.000</td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-6">
                <!-- card -->
                <div class="card shadow">
                    <h5 class="card-title border-bottom">History Withdrawal</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-history-withdrawal" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="40">No.</th>
                                        <th width="100">Tanggal</th>
                                        <th>Ditransfer ke</th>
                                        <th width="100">Jumlah (Rp.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                        <td><?php echo e(date('Y-m-d', strtotime($user->created_at))); ?></td>
                                        <td><?php echo e($user->nama_user); ?></td>
                                        <td align="right">75.000</td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
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

<script src="<?php echo e(asset('templates/matrix-admin/assets/extra-libs/DataTables/datatables.min.js')); ?>"></script>
<script type="text/javascript">
    // DataTable
    $('#table-arsip-komisi').DataTable();
    $('#table-history-withdrawal').DataTable();

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

<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" rel="stylesheet">
<style type="text/css">
    .border-top, .border-bottom {padding: 1.25rem;}
    .form-control {border-color: #caccce;}
    .input-group-text {border-color: #caccce;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/member/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\pra-kerja\resources\views/komisi/member/archive.blade.php ENDPATH**/ ?>