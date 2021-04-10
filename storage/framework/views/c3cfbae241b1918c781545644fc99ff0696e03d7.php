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
                <h4 class="page-title">Tambah Event</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/organizer">Home</a></li>
                            <li class="breadcrumb-item"><a href="/organizer/event">Event</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Event</li>
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
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <h4 class="card-title border-bottom">
                        Tambah Event
                    </h4>
                    <div class="card-body">
                        <form>
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Nama Event <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_event" class="form-control" placeholder="Masukkan Nama Event" autofocus>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Waktu Event <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" name="waktu_event" class="form-control date-range-picker">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Kategori</label>
                                    <div class="input-group">
                                        <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input type="checkbox" class="d-none" id="kategori-<?php echo e($data->id_kategori); ?>" name="kategori[]" value="<?php echo e($data->id_kategori); ?>">
                                        <span class="btn btn-outline-secondary btn-kategori mr-2 mb-2" data-id="<?php echo e($data->id_kategori); ?>">
                                            <i class="fa fa-times text-secondary"></i> 
                                            <?php echo e($data->nama_kategori); ?>

                                        </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Kapasitas <span class="text-danger">*</span></label>
                                    <input type="text" name="kapasitas" class="form-control number-only thousand-format" placeholder="Masukkan Kapasitas">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Lokasi <span class="text-danger">*</span></label>
                                    <input type="text" name="lokasi" class="form-control" placeholder="Masukkan Lokasi">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Kabupaten / Kota <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="kota">
                                        <option value="" disabled selected>--Pilih--</option>
                                        <?php $__currentLoopData = $rajaongkir['rajaongkir']['results']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($rajaongkir['rajaongkir']['results'][$key]['city_id']); ?>"><?php echo e($rajaongkir['rajaongkir']['results'][$key]['city_name_rev']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Deskripsi Event</label>
                                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Masukkan Deskripsi Event"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Jenis Tiket <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-sm-6 text-center">
                                            <a href="#" class="text-secondary" title="Tiket Berbayar" data-toggle="modal" data-target="#tiketBerbayarModal">
                                                <i style="font-size: 5rem;" class="fa fa-ticket-alt"></i>
                                                <p class="h5">Tiket Berbayar</p>
                                            </a>
                                        </div>
                                        <div class="col-sm-6 text-center">
                                            <a href="#" class="text-secondary" title="Tiket Gratis" data-toggle="modal" data-target="#tiketGratisModal">
                                                <i style="font-size: 5rem;" class="fa fa-ticket-alt"></i>
                                                <p class="h5">Tiket Gratis</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped table-bordered" id="table-tiket">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Jenis</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                        <th width="30" title="Edit"><i class="fa fa-edit"></th>
                                                        <th width="30" title="Hapus"><i class="fa fa-trash"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="row-tiket no-data">
                                                        <td colspan="6" align="center"><em class="text-danger">Tidak ada data.</em></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="border-top">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<!-- Modal Tiket Berbayar -->
<div class="modal fade" id="tiketBerbayarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tiket Berbayar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tiket-berbayar">
                    <div class="form-group col">
                        <label>Nama Tiket <span class="text-danger">*</span></label>
                        <input type="text" name="nama_tiket" class="form-control" placeholder="Masukkan Nama Tiket">
                    </div>
                    <div class="form-group col">
                        <label>Jumlah Tiket <span class="text-danger">*</span></label>
                        <input type="text" name="jumlah_tiket" class="form-control number-only thousand-format" placeholder="Masukkan Jumlah Tiket">
                    </div>
                    <div class="form-group col">
                        <label>Harga Tiket <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="harga_tiket" class="form-control number-only thousand-format" placeholder="Masukkan Harga Tiket">
                        </div>
                    </div>
                    <div class="form-group col">
                        <label>Waktu Penjualan <span class="text-danger">*</span></label>
                        <input type="text" name="waktu_penjualan" class="form-control date-range-picker" placeholder="Masukkan Waktu Penjualan">
                    </div>
                    <input type="hidden" name="jenis_tiket" value="1">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-submit-tiket-berbayar">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Tiket Berbayar -->
<!-- Modal Tiket Gratis -->
<div class="modal fade" id="tiketGratisModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tiket Gratis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tiket-gratis">
                    <div class="form-group col">
                        <label>Nama Tiket <span class="text-danger">*</span></label>
                        <input type="text" name="nama_tiket" class="form-control" placeholder="Masukkan Nama Tiket">
                    </div>
                    <div class="form-group col">
                        <label>Jumlah Tiket <span class="text-danger">*</span></label>
                        <input type="text" name="jumlah_tiket" class="form-control number-only thousand-format" placeholder="Masukkan Jumlah Tiket">
                    </div>
                    <input type="hidden" name="harga_tiket" value="0">
                    <div class="form-group col">
                        <label>Waktu Penjualan <span class="text-danger">*</span></label>
                        <input type="text" name="waktu_penjualan" class="form-control date-range-picker" placeholder="Masukkan Waktu Penjualan">
                    </div>
                    <input type="hidden" name="jenis_tiket" value="2">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-submit-tiket-gratis">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Tiket Gratis -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/select2/dist/js/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/select2/dist/js/select2.min.js')); ?>"></script>
<script type="text/javascript">
    // Daterangepicker
    $('.date-range-picker').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(1, 'hour'),
        timePicker24Hour: true,
        locale: {
          format: 'DD/MM/YYYY HH:mm'
        }
    });
    // End Datepicker

    // Select2
    $("select[name=kota]").select2();

    $(window).resize(function() {
        $(".select2").css("width", "100%");
    });
    // End Select2

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

    // Store Kapasitas
    var kapasitas = 0;
    $(document).on("change", "input[name=kapasitas]", function(){
        var value = $(this).val();
        kapasitas = value.replace(/\D/g,'');
    });

    // Button kategori
    $(document).on("click", ".btn-kategori", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        if($(this).hasClass("btn-outline-secondary")){
            $(this).removeClass("btn-outline-secondary").addClass("btn-secondary");
            $(this).find("i").removeClass("text-secondary fa-times").addClass("text-white fa-check");
            $("#kategori-" + id).prop("checked", true);
        }
        else{
            $(this).addClass("btn-outline-secondary").removeClass("btn-secondary");
            $(this).find("i").removeClass("text-white fa-check").addClass("text-secondary fa-times");
            $("#kategori-" + id).prop("checked", false);
        }
    });

    $(document).on("mouseover", ".btn-kategori", function(){
        if($(this).hasClass("btn-outline-secondary")){
            $(this).find("i").removeClass("text-secondary").addClass("text-white");
        }
    });

    $(document).on("mouseleave", ".btn-kategori", function(){
        if($(this).hasClass("btn-outline-secondary")){
            $(this).find("i").removeClass("text-white").addClass("text-secondary");
        }
    });
    // End Button Kategori

    // CRUD Tiket
    $(document).on("click", "#btn-submit-tiket-berbayar", function(e){
        e.preventDefault();
        formTiket("#form-tiket-berbayar");
    });

    $(document).on("click", "#btn-submit-tiket-gratis", function(e){
        e.preventDefault();
        formTiket("#form-tiket-gratis");
    });

    $(document).on("click", ".btn-edit-tiket", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var data = $("tr.row-tiket[data-id=" + id + "]");
        var jenis = data[0].cells[1].innerText;
        var form_name = (jenis == "Berbayar") ? "#form-tiket-berbayar" : "#form-tiket-gratis";
        var modal_name = (jenis == "Berbayar") ? "#tiketBerbayarModal" : "#tiketGratisModal";
        $(form_name).find("input[name=nama_tiket]").val(data[0].cells[0].innerText);
        $(form_name).find("input[name=jumlah_tiket]").val(data[0].cells[2].innerText);
        $(form_name).find("input[name=harga_tiket]").val(data[0].cells[3].innerText);
        $(form_name).find("input[name=waktu_penjualan]").val(data[0].cells[4].innerText);
        $(modal_name).modal("show");
    });

    $(document).on("click", ".btn-delete-tiket", function(e){
        e.preventDefault();
        alert("Ini btn-delete-tiket");
    });
    // End CRUD Tiket

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

    function formTiket(form_name){
        // Serialize and set data
        var data = $(form_name).serializeArray();
        data[4].value = (data[4].value == 1) ? 'Berbayar' : 'Gratis';

        // Count table row
        table_rows = $("#table-tiket tbody tr").length;
        if(table_rows == 1){
            table_rows = $("#table-tiket tbody tr").hasClass("no-data") ? 0 : 1;
        }

        // If table rows is 0
        $("#table-tiket tbody tr.no-data").remove();

        // Send data to table
        var html = '';
        html += '<tr class="row-tiket" data-id="' + (table_rows + 1) + '">';
        html += '<td>' + data[0].value + '</td>';
        html += '<td>' + data[4].value + '</td>';
        html += '<td align="right">' + data[1].value + '</td>';
        html += '<td align="right">' + data[2].value + '</td>';
        html += '<td style="display:none">' + data[3].value + '</td>';
        html += '<td>';
        html += '<a href="#" data-id="' + (table_rows + 1) + '" class="btn btn-sm btn-block btn-info btn-edit-tiket" title="Edit"><i class="fa fa-edit"></i></a>';
        html += '</td>';
        html += '<td>';
        html += '<a href="#" data-id="' + (table_rows + 1) + '" class="btn btn-sm btn-block btn-danger btn-delete-tiket" title="Hapus"><i class="fa fa-trash"></i></a>';
        html += '</td>';
        html += '</tr>';
        $("#table-tiket tbody").append(html);

        // Reset modal
        $(form_name).find("input[name=nama_tiket]").val(null);
        $(form_name).find("input[name=jumlah_tiket]").val(null);
        $(form_name).find("input[name=harga_tiket]").val(null);
        $(".modal").modal("hide");
    }
    // End Functions
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('templates/matrix-admin/assets/libs/select2/dist/css/select2.min.css')); ?>">
<style type="text/css">
    .card-title {padding: 1.25rem;}
    .border-top {padding: .75rem 1.25rem;}
    .btn-kategori {border-radius: 2rem;}
    .select2-container--default .select2-selection--single {border-color: #e9ecef; border-radius: 2px; height: 35px; padding: 0.375rem 0.75rem;}
    .select2-container--default .select2-selection--single .select2-selection__rendered {line-height: 24px;}
    .select2-container .select2-selection--single .select2-selection__rendered {padding-left: 0;}
    .select2-container--default .select2-selection--single .select2-selection__arrow {height: 35px;}
    #table-tiket thead tr th {text-align: center; font-weight: bold;}
    #table-tiket tbody tr td {padding: .5rem 1rem;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/organizer/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\e-tiket\resources\views/event/organizer/create.blade.php ENDPATH**/ ?>