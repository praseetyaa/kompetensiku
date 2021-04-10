<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <title>Registrasi</title>
  <style type="text/css">
    body {height: calc(100vh); background-repeat: no-repeat; background-size: cover; background-position: center;}
    .wrapper {background: rgba(0,0,0,.6);}
    .card {width: 700px; border-radius: 0;}
    .card-header span {display: inline-block; height: 12px; width: 12px; margin: 0px 5px; border-radius: 50%; background: rgba(0,0,0,.2);}
    .card-header span.active {background: #007bff!important;}
    .input-group-text {width: 40px;}
</style>
</head>
<body class="small" background="<?php echo e(asset('assets/images/background/applicant.jpg')); ?>">
  <div class="wrapper h-100">
    <div class="d-flex justify-content-center h-100">
      <div class="card my-auto">
        <div class="card-header text-center">
          <span data-step="1" class="<?php echo e($step == 1 ? 'active' : ''); ?>"></span>
          <span data-step="2" class="<?php echo e($step == 2 ? 'active' : ''); ?>"></span>
          <span data-step="3" class="<?php echo e($step == 3 ? 'active' : ''); ?>"></span>
          <!-- <span data-step="4" class="<?php echo e($step == 4 ? 'active' : ''); ?>"></span> -->
        </div>
        <div class="card-body">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-5 text-uppercase">Form Upload Berkas</h1>
          </div>
          <form method="post" action="/applicant/register/step-2" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="form-row">
              <div class="form-group col-sm-6">
                <label>Pas Foto:</label>
                <input type="file" id="pas_foto" class="d-none" accept="image/*">
                <div class="input-group">
                  <input name="pas_foto" type="text" class="form-control form-control-sm <?php echo e($errors->has('pas_foto') ? 'is-invalid' : ''); ?>" value="<?php echo e(!empty($array) ? $array['pas_foto'] : old('pas_foto')); ?>" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-sm <?php echo e($errors->has('pas_foto') ? 'btn-outline-danger' : 'btn-outline-primary'); ?> btn-upload" data-id="pas_foto" type="button" title="Upload Foto"><i class="fa fa-upload"></i></button>
                  </div>
                </div>
                <?php if($errors->has('pas_foto')): ?>
                <small class="text-danger">
                  <?php echo e(ucfirst($errors->first('pas_foto'))); ?>

                </small>
                <?php endif; ?>
                <div class="row">
                  <div class="col">
                    <img name="img_pas_foto" class="img-thumbnail <?php echo e(!empty($array) ? '' : 'd-none'); ?> mt-3" width="200" src="<?php echo e(!empty($array) ? asset('assets/images/pas-foto/'.$array['pas_foto']) : ''); ?>">
                    <input type="hidden" name="src_pas_foto">
                  </div>
                </div>
              </div>
              <div class="form-group col-sm-6">
                <label>Foto Ijazah:</label>
                <input type="file" id="foto_ijazah" class="d-none" accept="image/*">
                <div class="input-group">
                  <input name="foto_ijazah" type="text" class="form-control form-control-sm <?php echo e($errors->has('foto_ijazah') ? 'is-invalid' : ''); ?>" value="<?php echo e(!empty($array) ? $array['foto_ijazah'] : old('foto_ijazah')); ?>" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-sm <?php echo e($errors->has('foto_ijazah') ? 'btn-outline-danger' : 'btn-outline-primary'); ?> btn-upload" data-id="foto_ijazah" type="button" title="Upload Foto"><i class="fa fa-upload"></i></button>
                  </div>
                </div>
                <?php if($errors->has('foto_ijazah')): ?>
                <small class="text-danger">
                  <?php echo e(ucfirst($errors->first('foto_ijazah'))); ?>

                </small>
                <?php endif; ?>
                <div class="row">
                  <div class="col">
                    <img name="img_foto_ijazah" class="img-thumbnail <?php echo e(!empty($array) != null ? '' : 'd-none'); ?> mt-3" width="200" src="<?php echo e(!empty($array) ? asset('assets/images/foto-ijazah/'.$array['foto_ijazah']) : ''); ?>">
                    <input type="hidden" name="src_foto_ijazah">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <div class="row">
                <div class="col-auto ml-auto">
                  <a href="/applicant/register/step-1" class="btn btn-sm btn-danger">&laquo; Sebelumnya</a>
                  <button type="submit" class="btn btn-sm btn-primary" disabled>Selanjutnya &raquo;</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(function(){
      enableSubmitButton();
    })

    $(document).on("click", ".btn-upload", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      $("#" + id).trigger("click");
    });

    function readURL(input) {
      if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          var id = $(input).attr("id");
          var today = new Date();
          $("input[name=" + id + "]").val(today.getTime() + ".jpg");
          $("img[name=img_" + id + "]").attr('src', e.target.result).removeClass("d-none");
          $("input[name=src_" + id + "]").val(e.target.result);
          enableSubmitButton();
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    function enableSubmitButton(){
      var selector = $("input[type=text].form-control");
      var array = [];
      $(selector).each(function(){
        if($(this).val() != ""){
          array.push($(this).val());
        }
      });
      array.length == 2 ? $("button[type=submit]").removeAttr("disabled") : $("button[type=submit]").attr("disabled","disabled");
    }

    $(document).on("change", "input[type=file]", function(){
      readURL(this);
    });
  </script>
</body>
</html><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/auth/applicant/register-step-2.blade.php ENDPATH**/ ?>