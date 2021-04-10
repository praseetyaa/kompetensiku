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
                <h4 class="page-title">Withdrawal</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Withdrawal</li>
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
                    <h5 class="card-title border-bottom">Withdrawal</h5>
                    <div class="card-body">
                        <?php if(Session::get('message') != null): ?>
                            <div class="alert alert-success alert-dismissible mb-4 fade show" role="alert">
                                <?php echo e(Session::get('message')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table id="table-history-withdrawal" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="40">No.</th>
                                        <th width="80">Invoice</th>
                                        <th width="100">Tanggal</th>
                                        <th>Nama User</th>
                                        <th>Ditransfer ke</th>
                                        <th width="100">Status</th>
                                        <th width="100">Jumlah (Rp.)</th>
                                        <th width="40">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $withdrawal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                        <td><?php echo e($data->inv_withdrawal); ?></td>
                                        <td><span title="<?php echo e(date('Y-m-d H:i:s', strtotime($data->withdrawal_at))); ?>" style="text-decoration: underline; cursor: help;"><?php echo e(date('Y-m-d', strtotime($data->withdrawal_at))); ?></span></td>
                                        <td><a href="/admin/user/detail/<?php echo e($data->id_user); ?>"><?php echo e($data->nama_user); ?></a></td>
                                        <td><?php echo e($data->nama_platform); ?> | <?php echo e($data->nomor); ?> | <?php echo e($data->atas_nama); ?></td>
										<td>
											<?php if($data->withdrawal_status == 0): ?>
												<strong class="text-danger">Sedang Diproses</strong>
											<?php else: ?>
												<strong class="text-success">Diterima</strong>
											<?php endif; ?>
										</td>
                                        <td><?php echo e(number_format($data->nominal,0,',','.')); ?></td>
                                        <td>
											<?php if($data->withdrawal_status == 0): ?>
												<a href="#" class="btn btn-warning btn-sm btn-block btn-send" data-id="<?php echo e($data->id_withdrawal); ?>" data-toggle="modal" data-target="#modal-send" title="Kirim Komisi"><i class="fa fa-chevron-right"></i></a>
											<?php else: ?>
												<a href="<?php echo e(asset('assets/images/withdrawal/'.$data->withdrawal_proof)); ?>" class="btn btn-success btn-sm btn-block image-popup-vertical-fit" title="Bukti Transfer"><i class="fa fa-image"></i></a>
											<?php endif; ?>
										</td>
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

<!-- Modal Kirim Komisi -->
<div class="modal fade" id="modal-send" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kirim Komisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-send" method="post" action="/admin/transaksi/withdrawal/send">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Upload Bukti Transfer <span class="text-danger">*</span></label>
							<br>
                            <button id="btn-choose" type="button" class="btn btn-md btn-cyan mr-2"><i class="fa fa-folder-open mr-2"></i>Pilih File...</button>
							<input type="file" id="file" class="d-none" accept="image/*">
							<br><br>
							<img id="image" class="img-thumbnail d-none">
							<input type="hidden" name="src_image" id="src_image">
                        </div>
                        <input type="hidden" name="id_withdrawal">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-submit-send" disabled>Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Kirim Komisi -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script src="<?php echo e(asset('templates/matrix-admin/assets/extra-libs/DataTables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/matrix-admin/assets/libs/magnific-popup/meg.init.js')); ?>"></script>
<script type="text/javascript">
    // DataTable
    $('#table-history-withdrawal').DataTable({
        "fnDrawCallback": function(){
            $('.image-popup-vertical-fit').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: false,
                fixedContentPos: true,
                image: {
                  verticalFit: true
                },
                zoom: {
                  enabled: true,
                  duration: 300 // don't foget to change the duration also in CSS
                },
            });
        }
    });

    /* Upload File */
    $(document).on("click", ".btn-send", function(e){
        e.preventDefault();
		var id = $(this).data("id");
		$("input[name=id_withdrawal]").val(id);
    });
	
    $(document).on("click", "#btn-choose", function(e){
        e.preventDefault();
        $("#file").trigger("click");
    });

    $(document).on("change", "#file", function(){
        // ukuran maksimal upload file
        $max = 2 * 1024 * 1024;

        // validasi
        if(this.files && this.files[0]) {
            // jika ukuran melebihi batas maksimum
            if(this.files[0].size > $max){
                alert("Ukuran file terlalu besar dan melebihi batas maksimum! Maksimal 2 MB");
                $("#file").val(null);
                $("#btn-submit-send").attr("disabled","disabled");
            }
            // jika ekstensi tidak diizinkan
            else if(!validateExtension(this.files[0].name)){
                alert("Ekstensi file tidak diizinkan!");
                $("#file").val(null);
                $("#btn-submit-send").attr("disabled","disabled");
            }
            // validasi sukses
            else{
        		readURL(this);
                $("#btn-submit-send").removeAttr("disabled");
            }
            // console.log(this.files[0]);
        }
    });
	
	$(document).on("click", "#btn-submit-send", function(e){
		e.preventDefault();
		$("#form-send")[0].submit();
	});

    $('#modal').on('hidden.bs.modal', function(){
        $("#file").val(null);
        $("#src_image").val(null);
		$("input[name=id_withdrawal]").val(null);
		$("#image").removeAttr("src").addClass("d-none");
        $("#btn-submit-send").attr("disabled","disabled");
    });

    function getFileExtension(filename){
        var split = filename.split(".");
        var extension = split[split.length - 1];
        return extension;
    }

    function validateExtension(filename){
        var ext = getFileExtension(filename);

        // ekstensi yang diizinkan
        var extensions = ['jpg', 'jpeg', 'png', 'bmp', 'svg'];
        for(var i in extensions){
            if(ext == extensions[i]) return true;
        }
        return false;
    }

    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                imageURL = e.target.result;
				$("#src_image").val(e.target.result);
				$("#image").attr("src", e.target.result).removeClass("d-none");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/magnific-popup/dist/magnific-popup.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/withdrawal/admin/index.blade.php ENDPATH**/ ?>