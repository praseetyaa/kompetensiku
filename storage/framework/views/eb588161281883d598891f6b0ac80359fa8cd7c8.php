<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" />
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
        </div>
        <div class="card-body">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-5 text-uppercase">Form Identitas</h1>
          </div>
          <form method="post" action="/applicant/register/step-1">
            <?php echo e(csrf_field()); ?>

            <div class="form-row">
              <div class="form-group col-12">
                <label>Nama Lengkap:</label>
                <input name="nama_lengkap" type="text" class="form-control form-control-sm <?php echo e($errors->has('nama_lengkap') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Nama Lengkap" value="<?php echo e(Session::has('nama_lengkap') ? Session::get('nama_lengkap') : old('nama_lengkap')); ?>">
                <?php if($errors->has('nama_lengkap')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('nama_lengkap'))); ?>

                </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-sm-6">
                <label>Tempat Lahir:</label>
                <input name="tempat_lahir" type="text" class="form-control form-control-sm <?php echo e($errors->has('tempat_lahir') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Tempat Lahir" value="<?php echo e(Session::has('tempat_lahir') ? Session::get('tempat_lahir') : old('tempat_lahir')); ?>">
                <?php if($errors->has('tempat_lahir')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('tempat_lahir'))); ?>

                </div>
                <?php endif; ?>
              </div>
              <div class="form-group col-sm-6">
                <label>Tanggal Lahir:</label>
                <div class="input-group">
                  <input name="tanggal_lahir" type="text" class="form-control form-control-sm <?php echo e($errors->has('tanggal_lahir') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Tanggal Lahir" value="<?php echo e(Session::has('tanggal_lahir') ? Session::get('tanggal_lahir') : old('tanggal_lahir')); ?>" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-sm <?php echo e($errors->has('tanggal_lahir') ? 'btn-outline-danger' : 'btn-outline-primary'); ?> btn-show-datepicker" type="button"><i class="fa fa-calendar"></i></button>
                  </div>
                </div>
                <?php if($errors->has('tanggal_lahir')): ?>
                <small class="text-danger">
                  <?php echo e(ucfirst($errors->first('tanggal_lahir'))); ?>

                </small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-sm-6">
                <label>Jenis Kelamin:</label>
                <select name="jenis_kelamin" class="form-control form-control-sm <?php echo e($errors->has('jenis_kelamin') ? 'is-invalid' : ''); ?>">
                  <option value="" disabled selected>--Pilih--</option>
                  <?php if(Session::has('jenis_kelamin')): ?>
                  <option value="L" <?php echo e(Session::get('jenis_kelamin') == 'L' ? 'selected' : ''); ?>>Laki-Laki</option>
                  <option value="P" <?php echo e(Session::get('jenis_kelamin') == 'P' ? 'selected' : ''); ?>>Perempuan</option>
                  <?php else: ?>
                  <option value="L" <?php echo e(old('jenis_kelamin') == 'L' ? 'selected' : ''); ?>>Laki-Laki</option>
                  <option value="P" <?php echo e(old('jenis_kelamin') == 'P' ? 'selected' : ''); ?>>Perempuan</option>
                  <?php endif; ?>
                </select>
                <?php if($errors->has('jenis_kelamin')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('jenis_kelamin'))); ?>

                </div>
                <?php endif; ?>
              </div>
              <div class="form-group col-sm-6">
                <label>Agama:</label>
                <select name="agama" class="form-control form-control-sm <?php echo e($errors->has('agama') ? 'is-invalid' : ''); ?>">
                  <option value="" disabled selected>--Pilih--</option>
                  <?php if(Session::has('agama')): ?>
                    <?php $__currentLoopData = $agama; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id_agama); ?>" <?php echo e(Session::get('agama') == $data->id_agama ? 'selected' : ''); ?>><?php echo e($data->agama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                    <?php $__currentLoopData = $agama; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id_agama); ?>" <?php echo e(old('agama') == $data->id_agama ? 'selected' : ''); ?>><?php echo e($data->agama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </select>
                <?php if($errors->has('agama')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('agama'))); ?>

                </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-sm-6">
                <label>Email:</label>
                <input name="email" type="email" class="form-control form-control-sm <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Email" value="<?php echo e(Session::has('email') ? Session::get('email') : old('email')); ?>">
                <?php if($errors->has('email')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('email'))); ?>

                </div>
                <?php endif; ?>
              </div>
              <div class="form-group col-sm-6">
                <label>No. HP:</label>
                <input name="nomor_hp" type="text" class="form-control form-control-sm <?php echo e($errors->has('nomor_hp') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Nomor HP" value="<?php echo e(Session::has('nomor_hp') ? Session::get('nomor_hp') : old('nomor_hp')); ?>">
                <?php if($errors->has('nomor_hp')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('nomor_hp'))); ?>

                </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-sm-6">
                <label>Alamat:</label>
                <textarea name="alamat" class="form-control form-control-sm <?php echo e($errors->has('alamat') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Alamat" rows="3"><?php echo e(Session::has('alamat') ? Session::get('alamat') : old('alamat')); ?></textarea>
                <?php if($errors->has('alamat')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('alamat'))); ?>

                </div>
                <?php endif; ?>
              </div>
              <div class="form-group col-sm-6">
                <label>Pendidikan Terakhir:</label>
                <textarea name="pendidikan_terakhir" class="form-control form-control-sm <?php echo e($errors->has('pendidikan_terakhir') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Pendidikan Terakhir" rows="3"><?php echo e(Session::has('pendidikan_terakhir') ? Session::get('pendidikan_terakhir') : old('pendidikan_terakhir')); ?></textarea>
                <?php if($errors->has('pendidikan_terakhir')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('pendidikan_terakhir'))); ?>

                </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-row">
              <label class="col text-md-center">Akun Sosial Media:</label>
            </div>
            <div class="form-row">
              <div class="form-group col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-facebook"></i></span>
                  </div>
                  <input name="akun_sosmed[Facebook]" type="text" class="form-control form-control-sm <?php echo e($errors->has('akun_sosmed.Facebook') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Akun Facebook" value="<?php echo e(Session::has('akun_sosmed') ? Session::get('akun_sosmed')['Facebook'] : old('akun_sosmed.Facebook')); ?>">
                </div>
                <?php if($errors->has('akun_sosmed.Facebook')): ?>
                <small class="text-danger">
                  <?php echo e(ucfirst(str_replace(".", " ", str_replace("_sosmed", " ", $errors->first('akun_sosmed.Facebook'))))); ?>.
                </small>
                <?php endif; ?>
              </div>
              <div class="form-group col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-twitter"></i></span>
                  </div>
                  <input name="akun_sosmed[Twitter]" type="text" class="form-control form-control-sm <?php echo e($errors->has('akun_sosmed.Twitter') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Akun Twitter" value="<?php echo e(Session::has('akun_sosmed') ? Session::get('akun_sosmed')['Twitter'] : old('akun_sosmed.Twitter')); ?>">
                </div>
                <?php if($errors->has('akun_sosmed.Twitter')): ?>
                <small class="text-danger">
                  <?php echo e(ucfirst(str_replace(".", " ", str_replace("_sosmed", " ", $errors->first('akun_sosmed.Twitter'))))); ?>.
                </small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                  </div>
                  <input name="akun_sosmed[Instagram]" type="text" class="form-control form-control-sm <?php echo e($errors->has('akun_sosmed.Instagram') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Akun Instagram" value="<?php echo e(Session::has('akun_sosmed') ? Session::get('akun_sosmed')['Instagram'] : old('akun_sosmed.Instagram')); ?>">
                </div>
                <?php if($errors->has('akun_sosmed.Instagram')): ?>
                <small class="text-danger">
                  <?php echo e(ucfirst(str_replace(".", " ", str_replace("_sosmed", " ", $errors->first('akun_sosmed.Instagram'))))); ?>.
                </small>
                <?php endif; ?>
              </div>
              <div class="form-group col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-youtube"></i></span>
                  </div>
                  <input name="akun_sosmed[YouTube]" type="text" class="form-control form-control-sm <?php echo e($errors->has('akun_sosmed.YouTube') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Akun YouTube" value="<?php echo e(Session::has('akun_sosmed') ? Session::get('akun_sosmed')['YouTube'] : old('akun_sosmed.YouTube')); ?>">
                </div>
                <?php if($errors->has('akun_sosmed.YouTube')): ?>
                <small class="text-danger">
                  <?php echo e(ucfirst(str_replace(".", " ", str_replace("_sosmed", " ", $errors->first('akun_sosmed.YouTube'))))); ?>.
                </small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group mt-3">
              <div class="row">
                <div class="col-auto ml-auto">
                  <input type="hidden" name="url" value="<?php echo e($url_form); ?>">
                  <button type="submit" class="btn btn-sm btn-primary">Selanjutnya &raquo;</button>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(function(){
      $('input[name=tanggal_lahir]').datepicker({
        format: 'yyyy-mm-dd',
      });

      $(document).on("click", ".btn-show-datepicker", function(e){
        e.preventDefault();
        $('input[name=tanggal_lahir]').focus();
      })
    });
  </script>
</body>
</html><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/auth/applicant/register-step-1.blade.php ENDPATH**/ ?>