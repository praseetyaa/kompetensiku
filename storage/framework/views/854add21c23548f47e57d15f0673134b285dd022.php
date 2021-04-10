<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" />
  <title>Registrasi</title>
  <style type="text/css">
    .bg-primary {height: calc(100vh);}
    .card {width: 700px;}
    .input-group-text {width: 40px;}
</style>
</head>
<body class="bg-primary small">
  <div class="container h-100">
    <div class="d-flex justify-content-center h-100">
      <div class="card my-auto">
        <div class="card-body">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-5 text-uppercase">Form Identitas</h1>
          </div>
          <form method="post" action="/applicant/register/step-1">
            <?php echo e(csrf_field()); ?>

            <div class="form-row">
              <div class="form-group col-12">
                <label>Nama:</label>
                <input name="nama" type="text" class="form-control form-control-sm <?php echo e($errors->has('nama') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Nama" value="<?php echo e(old('nama')); ?>">
                <?php if($errors->has('nama')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('nama'))); ?>

                </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-sm-6">
                <label>Tempat Lahir:</label>
                <input name="tempat_lahir" type="text" class="form-control form-control-sm <?php echo e($errors->has('tempat_lahir') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Tempat Lahir" value="<?php echo e(old('tempat_lahir')); ?>">
                <?php if($errors->has('tempat_lahir')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('tempat_lahir'))); ?>

                </div>
                <?php endif; ?>
              </div>
              <div class="form-group col-sm-6">
                <label>Tanggal Lahir:</label>
                <div class="input-group">
                  <input name="tanggal_lahir" type="text" class="form-control form-control-sm <?php echo e($errors->has('tanggal_lahir') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Tanggal Lahir" value="<?php echo e(old('tanggal_lahir')); ?>" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-sm <?php echo e($errors->has('tanggal_lahir') ? 'btn-outline-danger' : 'btn-outline-primary'); ?> btn-show-datepicker" type="button"><i class="fa fa-calendar"></i></button>
                  </div>
                </div>
                <?php if($errors->has('tanggal_lahir')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('tanggal_lahir'))); ?>

                </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-sm-6">
                <label>Jenis Kelamin:</label>
                <select name="jenis_kelamin" class="form-control form-control-sm <?php echo e($errors->has('jenis_kelamin') ? 'is-invalid' : ''); ?>">
                  <option value="" disabled selected>--Pilih--</option>
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
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
                  <option value="1">Islam</option>
                  <option value="2">Kristen</option>
                  <option value="3">Hindu</option>
                  <option value="4">Buddha</option>
                  <option value="0">Lain-Lain</option>
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
                <input name="email" type="email" class="form-control form-control-sm <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Email" value="<?php echo e(old('email')); ?>">
                <?php if($errors->has('email')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('email'))); ?>

                </div>
                <?php endif; ?>
              </div>
              <div class="form-group col-sm-6">
                <label>No. Telp:</label>
                <input name="no_telepon" type="text" class="form-control form-control-sm <?php echo e($errors->has('no_telepon') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Nomor Telepon" value="<?php echo e(old('no_telepon')); ?>">
                <?php if($errors->has('no_telepon')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('no_telepon'))); ?>

                </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-sm-6">
                <label>Alamat:</label>
                <textarea name="alamat" class="form-control form-control-sm <?php echo e($errors->has('alamat') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Alamat" rows="3"><?php echo e(old('alamat')); ?></textarea>
                <?php if($errors->has('alamat')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('alamat'))); ?>

                </div>
                <?php endif; ?>
              </div>
              <div class="form-group col-sm-6">
                <label>Pendidikan Terakhir:</label>
                <textarea name="pendidikan_terakhir" class="form-control form-control-sm <?php echo e($errors->has('pendidikan_terakhir') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Pendidikan Terakhir" rows="3"><?php echo e(old('pendidikan_terakhir')); ?></textarea>
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
                  <input name="akun_sosmed[Facebook]" type="text" class="form-control form-control-sm <?php echo e($errors->has('akun_sosmed.Facebook') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Akun Facebook" value="<?php echo e(old('akun_sosmed.Facebook')); ?>">
                </div>
                <?php if($errors->has('akun_sosmed.Facebook')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('akun_sosmed.Facebook'))); ?>

                </div>
                <?php endif; ?>
              </div>
              <div class="form-group col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-twitter"></i></span>
                  </div>
                  <input name="akun_sosmed[Twitter]" type="text" class="form-control form-control-sm <?php echo e($errors->has('akun_sosmed.Twitter') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Akun Twitter" value="<?php echo e(old('akun_sosmed.Twitter')); ?>">
                </div>
                <?php if($errors->has('akun_sosmed.Twitter')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('akun_sosmed.Twitter'))); ?>

                </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                  </div>
                  <input name="akun_sosmed[Instagram]" type="text" class="form-control form-control-sm <?php echo e($errors->has('akun_sosmed.Instagram') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Akun Instagram" value="<?php echo e(old('akun_sosmed.Instagram')); ?>">
                </div>
                <?php if($errors->has('akun_sosmed.Instagram')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('akun_sosmed.Instagram'))); ?>

                </div>
                <?php endif; ?>
              </div>
              <div class="form-group col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-youtube"></i></span>
                  </div>
                  <input name="akun_sosmed[YouTube]" type="text" class="form-control form-control-sm <?php echo e($errors->has('akun_sosmed.YouTube') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Akun YouTube" value="<?php echo e(old('akun_sosmed.YouTube')); ?>">
                </div>
                <?php if($errors->has('akun_sosmed.YouTube')): ?>
                <div class="invalid-feedback">
                  <?php echo e(ucfirst($errors->first('akun_sosmed.YouTube'))); ?>

                </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-auto ml-auto">
                  <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-2"></i>Daftar</button>
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
</html><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/auth/applicant/register.blade.php ENDPATH**/ ?>