<!DOCTYPE html>
<html>
<head>
	<title>Upload File dengan Progress Bar</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

	<!-- Form -->
	<div class="container-fluid m-5">
		<div class="row">
			<div class="col-md-4 mx-auto card shadow p-3">
        <form class="text-center" id="upload_form" enctype="multipart/form-data">
          <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
          <input type="file" name="datafile" id="file" class="d-none">
          <button id="btn-choose" type="button" class="btn btn-md btn-secondary mr-2"><i class="fa fa-folder-open mr-2"></i>Browse...</button>
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
		</div>
	</div>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
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
            $("#progressBar").text('0%').css('width', '0%').attr('aria-valuenow', 0).removeClass("bg-success");
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
        ajax.open("POST", "/member/upload-file", true);
        ajax.send(formdata);
      });
       
      function progressHandler(event){
        // hitung prosentase
        var percent = (event.loaded / event.total) * 100;

        // menampilkan prosentase ke komponen id 'progressBar'
        $("#progressBar").text(Math.round(percent) + '%').css('width', Math.round(percent) + '%').attr('aria-valuenow', Math.round(percent));

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
    </script>
</body>
</html><?php /**PATH D:\XAMPP\htdocs\pra-kerja\resources\views/download/member/upload.blade.php ENDPATH**/ ?>