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
                <h4 class="page-title">Upload Produk</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/produk">Produk</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Upload Produk</li>
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
                <div class="row">
                    <div class="col-md-6 mx-md-auto">
                        <div class="card shadow">
                            <h5 class="card-title border-bottom">Upload Produk</h5>
                            <div class="card-body">
                                <form class="text-center" id="upload_form" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                                    <input type="file" name="datafile" id="file" class="d-none">
                                    <button id="btn-choose" type="button" class="btn btn-md btn-cyan mr-2"><i class="fa fa-folder-open mr-2"></i>Pilih File...</button>
                                    <button id="btn-upload" type="button" class="btn btn-md btn-primary" disabled><i class="fa fa-upload mr-2"></i>Upload</button>
                                </form>
                                <p class="mb-1 mt-3 d-none" id="filename"></p>
                                <div class="progress d-none">
                                    <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>
                                <div class="mt-3 d-none" id="uploaded-files">
                                    <h6>File terupload:</h6>
                                </div>
                            </div>
                            <div class="border-top">
                                <a href="/admin/produk" class="btn btn-block btn-success">Kembali ke Data Produk</a>
                            </div>
                        </div>
                    </div>
                </div>
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
    // Button Delete
    $(document).on("click", ".btn-delete", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var ask = confirm("Anda yakin ingin menghapus data ini?");
        if(ask){
            $("#id").val(id);
            $("#form").submit();
        }
    });

    /* Upload File */

    $(document).on("click", "#btn-choose", function(e){
        e.preventDefault();
        $("#file").trigger("click");
    });

    $(document).on("change", "#file", function(){
        // ukuran maksimal upload file
        $max = 40 * 1024 * 1024;

        // validasi
        if(this.files && this.files[0]) {
            // jika ukuran melebihi batas maksimum
            if(this.files[0].size > $max){
                alert("Ukuran file terlalu besar dan melebihi batas maksimum!");
                $("#filename").addClass("d-none").text(null);
                $(".progress").addClass("d-none");
                $("#file").val(null);
                $("#btn-upload").attr("disabled","disabled");
            }
            // jika ekstensi tidak diizinkan
            else if(!validateExtension(this.files[0].name)){
                alert("Ekstensi file tidak diizinkan!");
                $("#filename").addClass("d-none").text(null);
                $(".progress").addClass("d-none");
                $("#file").val(null);
                $("#btn-upload").attr("disabled","disabled");
            }
            // validasi sukses
            else{
                $("#filename").removeClass("d-none").text(this.files[0].name);
                $(".progress").removeClass("d-none");
                $("#progressBar").text('0%').css({
                    'width' : '0%',
                    'color' : '#333',
                    'margin-left' : '5px',
                    'margin-right' : '5px',
                }).attr('aria-valuenow', 0).removeClass("bg-success");
                $("#btn-upload").removeAttr("disabled");
            }
            // console.log(this.files[0]);
        }
    });

    $(document).on("click", "#btn-upload", function(e){
        e.preventDefault();

        // membaca data file yg akan diupload, dari komponen 'file'
        var file = document.getElementById("file").files[0];
        var _token = document.getElementById("_token").value;
        var formdata = new FormData();
        formdata.append("datafile", file);
        formdata.append("_token", _token);

        // proses upload via AJAX disubmit ke 'upload.php'
        // selama proses upload, akan menjalankan progressHandler()
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.open("POST", "/admin/upload-file", true);
        ajax.send(formdata);
    });

    function progressHandler(event){
        // hitung prosentase
        var percent = (event.loaded / event.total) * 100;

        // menampilkan prosentase ke komponen id 'progressBar'
        $("#progressBar").text(Math.round(percent) + '%').css({
            'width' : Math.round(percent) + '%',
            'color' : '#fff',
            'margin-left' : '0px',
            'margin-right' : '0px',
        }).attr('aria-valuenow', Math.round(percent));

        // jika sudah mencapai 100% akan mengganti warna background menjadi hijau
        if(Math.round(percent) == 100){
            $("#progressBar").addClass("bg-success");
            var filename = $("#filename").text();
            $("#uploaded-files").removeClass("d-none").append('<p class="mb-1"><i class="fa fa-check text-success mr-2"></i>' + filename + '</p>');
            $("#file").val(null);
            $("#btn-upload").attr("disabled","disabled");
        }
    }

    function getFileExtension(filename){
        var split = filename.split(".");
        var extension = split[split.length - 1];
        return extension;
    }

    function validateExtension(filename){
        var ext = getFileExtension(filename);

        // ekstensi yang tidak diizinkan
        var extensions = ['ade', 'adp', 'bat', 'chm', 'cmd', 'com', 'cpl', 'exe', 'hta', 'ins', 'isp', 'jse', 'lib', 'lnk', 'mde', 'msc', 'msp', 'mst', 'pif', 'scr', 'sct', 'shb', 'sys', 'vb', 'vbe', 'vbs', 'vxd', 'wsc', 'wsf', 'wsh'];
        for(var i in extensions){
            if(ext == extensions[i]) return false;
        }
        return true;
    }
    /* End Upload File */
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
    .border-top, .border-bottom {padding: 1.25rem;}
    .form-control {border-color: #caccce;}
    .input-group-text {border-color: #caccce;}
    .progress {height: 1rem; background-color: #eeeeee;}
    #uploaded-files {max-height: 250px; overflow-y: auto;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\pra-kerja\resources\views/download/admin/upload.blade.php ENDPATH**/ ?>