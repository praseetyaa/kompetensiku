<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Tes Wawancara</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Data Tes Wawancara</h6>
    </div>
    <div class="card-body">
      <form method="post" action="/applicant/tahap-wawancara/data-diri/save">
        <?php echo e(csrf_field()); ?>

        <div class="form-row">
          <div class="col-auto p-3 border border-muted mb-2 mr-2">
            <img src="<?php echo e(asset('assets/images/pas-foto/'.$pelamar->pas_foto)); ?>" class="img-fluid" width="200">
          </div>
          <div class="col">
            <div class="row">
              <div class="col-sm-auto ml-sm-auto">
                <p class="font-weight-bold text-md-right">
                  Untuk Jabatan: <?php echo e($pelamar->posisi); ?>

                </p>
              </div>
            </div>
          </div>
        </div>
        <?php if(Session::get('message') != null): ?>
        <div class="form-row">
          <div class="w-100 mt-2">
            <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
              <?php echo e(Session::get('message')); ?>

              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <ul class="nav nav-pills mt-3 mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" href="/applicant/tahap-wawancara/data-diri"><i class="fas fa-user mr-2"></i> Data Diri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-warning" href="/applicant/tahap-wawancara/riwayat-hidup"><i class="fas fa-school mr-2"></i> Riwayat Hidup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-warning" href="/applicant/tahap-wawancara/lain-lain"><i class="fas fa-hand-peace mr-2"></i> Lain-Lain</a>
          </li>
        </ul>
        <div class="form-row">
          <div class="w-100 mt-2 mb-3">
            <div class="alert alert-warning mb-0" role="alert">
              Isilah formulir berikut ini yang meliputi formulir <strong>Data Diri</strong>, <strong>Riwayat Hidup</strong>, dan <strong>Lain-Lain</strong>. Formulir ini akan kami gunakan sebagai bahan pertimbangan dalam tes Anda.
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr>
                <th colspan="2">Data Pribadi</th>
              </tr>
              <tr>
                <td width="50%">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-label">Nama Lengkap</td>
                      <td width="10">:</td>
                      <td>
                        <input type="text" name="nama_lengkap" class="form-control form-control-sm <?php echo e($errors->has('nama_lengkap') ? 'is-invalid' : ''); ?>" value="<?php echo e($pelamar->nama_lengkap); ?>">
                        <?php if($errors->has('nama_lengkap')): ?>
                        <small class="text-danger">
                          <?php echo e(ucfirst($errors->first('nama_lengkap'))); ?>

                        </small>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="td-label">Tempat, Tanggal Lahir</td>
                      <td>:</td>
                      <td>
                        <div class="d-md-flex">
                          <input type="text" name="tempat_lahir" class="form-control form-control-sm col-md" value="<?php echo e($pelamar->tempat_lahir); ?>">
                          <input type="text" name="tanggal_lahir" class="form-control form-control-sm col-md ml-md-2 mt-2 mt-md-0" value="<?php echo e($pelamar->tanggal_lahir); ?>">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="td-label">Jenis Kelamin</td>
                      <td>:</td>
                      <td>
                        <select name="jenis_kelamin" class="form-control form-control-sm <?php echo e($errors->has('jenis_kelamin') ? 'is-invalid' : ''); ?> col-lg-6">
                          <option value="" disabled>--Pilih--</option>
                          <option value="L" <?php echo e($pelamar->jenis_kelamin == 'L' ? 'selected' : ''); ?>>Laki-Laki</option>
                          <option value="P" <?php echo e($pelamar->jenis_kelamin == 'P' ? 'selected' : ''); ?>>Perempuan</option>
                        </select>
                        <?php if($errors->has('jenis_kelamin')): ?>
                        <small class="text-danger">
                          <?php echo e(ucfirst($errors->first('jenis_kelamin'))); ?>

                        </small>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="td-label">Nomor HP</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="nomor_hp" class="form-control form-control-sm" value="<?php echo e($pelamar->nomor_hp); ?>">
                        <?php if($errors->has('nomor_hp')): ?>
                        <small class="text-danger">
                          <?php echo e(ucfirst($errors->first('nomor_hp'))); ?>

                        </small>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="td-label">Email</td>
                      <td>:</td>
                      <td>
                        <input type="email" name="email" class="form-control form-control-sm <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" value="<?php echo e($pelamar->email); ?>">
                        <?php if($errors->has('email')): ?>
                        <small class="text-danger">
                          <?php echo e(ucfirst($errors->first('email'))); ?>

                        </small>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="td-label">Alamat</td>
                      <td>:</td>
                      <td>
                        <textarea name="alamat" class="form-control form-control-sm" rows="1"><?php echo e($pelamar->alamat); ?></textarea>
                        <?php if($errors->has('alamat')): ?>
                        <small class="text-danger">
                          <?php echo e(ucfirst($errors->first('alamat'))); ?>

                        </small>
                        <?php endif; ?>
                      </td>
                    </tr>
                  </table>
                </td>
                <td width="50%">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-label">Agama</td>
                      <td width="10">:</td>
                      <td>
                        <select name="agama" class="form-control form-control-sm col-lg-6">
                          <option value="" disabled>--Pilih--</option>
                          <?php $__currentLoopData = $agama; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($data->id_agama); ?>" <?php echo e($pelamar->agama == $data->id_agama ? 'selected' : ''); ?>><?php echo e($data->agama); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td class="td-label">Umur</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="umur" class="form-control form-control-sm <?php echo e($errors->has('umur') ? 'is-invalid' : ''); ?>" value="<?php echo e($pelamar->umur); ?>">
                        <?php if($errors->has('umur')): ?>
                        <small class="text-danger">
                          <?php echo e(ucfirst($errors->first('umur'))); ?>

                        </small>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="td-label">No. KTP</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="nomor_ktp" class="form-control form-control-sm <?php echo e($errors->has('nomor_ktp') ? 'is-invalid' : ''); ?>" value="<?php echo e($pelamar->nomor_ktp); ?>">
                        <?php if($errors->has('nomor_ktp')): ?>
                        <small class="text-danger">
                          <?php echo e(ucfirst($errors->first('nomor_ktp'))); ?>

                        </small>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="td-label">Nomor Telepon</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="nomor_telepon" class="form-control form-control-sm" value="<?php echo e($pelamar->nomor_telepon); ?>">
                        <?php if($errors->has('nomor_telepon')): ?>
                        <small class="text-danger">
                          <?php echo e(ucfirst($errors->first('nomor_telepon'))); ?>

                        </small>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="td-label">Status Hubungan</td>
                      <td>:</td>
                      <td>
                        <select name="status_hubungan" class="form-control form-control-sm <?php echo e($errors->has('status_hubungan') ? 'is-invalid' : ''); ?> col-lg-6">
                          <option value="" disabled selected>--Pilih--</option>
                          <option value="1" <?php echo e($pelamar->status_hubungan == '1' ? 'selected' : ''); ?>>Lajang</option>
                          <option value="2" <?php echo e($pelamar->status_hubungan == '2' ? 'selected' : ''); ?>>Menikah</option>
                          <option value="3" <?php echo e($pelamar->status_hubungan == '3' ? 'selected' : ''); ?>>Janda / Duda</option>
                        </select>
                        <?php if($errors->has('status_hubungan')): ?>
                        <small class="text-danger">
                          <?php echo e(ucfirst($errors->first('status_hubungan'))); ?>

                        </small>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="td-label">Kode Pos</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="kode_pos" class="form-control form-control-sm <?php echo e($errors->has('kode_pos') ? 'is-invalid' : ''); ?>" value="<?php echo e($pelamar->kode_pos); ?>">
                        <?php if($errors->has('kode_pos')): ?>
                        <small class="text-danger">
                          <?php echo e(ucfirst($errors->first('kode_pos'))); ?>

                        </small>
                        <?php endif; ?>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <th colspan="2">Data Darurat</th>
              </tr>
              <tr>
                <td width="50%">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-label">Nama Orang Tua</td>
                      <td width="10">:</td>
                      <td>
                        <input type="text" name="data_darurat[nama_orang_tua]" class="form-control form-control-sm <?php echo e($errors->has('nama_orang_tua') ? 'is-invalid' : ''); ?>" value="<?php echo e($pelamar->data_darurat != null ? $pelamar->data_darurat['nama_orang_tua'] : ''); ?>">
                        <?php if($errors->has('nama_orang_tua')): ?>
                        <small class="text-danger">
                          <?php echo e(ucfirst($errors->first('nama_orang_tua'))); ?>

                        </small>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="td-label">Alamat</td>
                      <td>:</td>
                      <td>
                        <textarea name="data_darurat[alamat_orang_tua]" class="form-control form-control-sm" rows="1"><?php echo e($pelamar->data_darurat != null ? $pelamar->data_darurat['alamat_orang_tua'] : ''); ?></textarea>
                        <?php if($errors->has('alamat_orang_tua')): ?>
                        <small class="text-danger">
                          <?php echo e(ucfirst($errors->first('alamat_orang_tua'))); ?>

                        </small>
                        <?php endif; ?>
                      </td>
                    </tr>
                  </table>
                </td>
                <td width="50%">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-label">Nomor HP</td>
                      <td width="10">:</td>
                      <td>
                        <input type="text" name="data_darurat[nomor_hp_orang_tua]" class="form-control form-control-sm <?php echo e($errors->has('nomor_hp_orang_tua') ? 'is-invalid' : ''); ?>" value="<?php echo e($pelamar->data_darurat != null ? $pelamar->data_darurat['nomor_hp_orang_tua'] : ''); ?>">
                        <?php if($errors->has('nomor_hp_orang_tua')): ?>
                        <small class="text-danger">
                          <?php echo e(ucfirst($errors->first('nomor_hp_orang_tua'))); ?>

                        </small>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="td-label">Pekerjaan</td>
                      <td width="10">:</td>
                      <td>
                        <input type="text" name="data_darurat[pekerjaan_orang_tua]" class="form-control form-control-sm <?php echo e($errors->has('pekerjaan_orang_tua') ? 'is-invalid' : ''); ?>" value="<?php echo e($pelamar->data_darurat != null ? $pelamar->data_darurat['pekerjaan_orang_tua'] : ''); ?>">
                        <?php if($errors->has('pekerjaan_orang_tua')): ?>
                        <small class="text-danger">
                          <?php echo e(ucfirst($errors->first('pekerjaan_orang_tua'))); ?>

                        </small>
                        <?php endif; ?>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <th colspan="2">Data Akun Sosial Media</th>
              </tr>
              <tr>
                <td width="50%">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-label">Facebook</td>
                      <td width="10">:</td>
                      <td><input type="text" name="akun_sosmed[Facebook]" class="form-control form-control-sm" value="<?php echo e($pelamar->akun_sosmed != null ? $pelamar->akun_sosmed['Facebook'] : ''); ?>"></td>
                    </tr>
                    <tr>
                      <td class="td-label">Twitter</td>
                      <td width="10">:</td>
                      <td><input type="text" name="akun_sosmed[Twitter]" class="form-control form-control-sm" value="<?php echo e($pelamar->akun_sosmed != null ? $pelamar->akun_sosmed['Twitter'] : ''); ?>"></td>
                    </tr>
                  </table>
                </td>
                <td width="50%">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-label">Instagram</td>
                      <td width="10">:</td>
                      <td><input type="text" name="akun_sosmed[Instagram]" class="form-control form-control-sm" value="<?php echo e($pelamar->akun_sosmed != null ? $pelamar->akun_sosmed['Instagram'] : ''); ?>"></td>
                    </tr>
                    <tr>
                      <td class="td-label">YouTube</td>
                      <td width="10">:</td>
                      <td><input type="text" name="akun_sosmed[YouTube]" class="form-control form-control-sm" value="<?php echo e($pelamar->akun_sosmed != null ? $pelamar->akun_sosmed['YouTube'] : ''); ?>"></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
          <div class="col">
            <strong>* Semua keterangan yang tertulis diatas saya buat dengan jujur dan sungguh – sungguh.</strong>
          </div>
        </div>
        <div class="form-group mt-3">
          <input type="hidden" name="id" value="<?php echo e($pelamar->id_pelamar); ?>">
          <input type="hidden" name="id_user" value="<?php echo e($pelamar->id_user); ?>">
          <button type="submit" class="btn btn-success">Simpan</button>
          <a href="/applicant" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(function(){
    // Datepicker
    $('input[name=tanggal_lahir]').datepicker({
      format: 'yyyy-mm-dd',
    });

    // Button show datepicker
    $(document).on("click", ".btn-show-datepicker", function(e){
      e.preventDefault();
      $('input[name=tanggal_lahir]').focus();
    });
  });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" />
<style type="text/css">
  .nav-pills .nav-link {border-radius: 0;}
  .table {min-width: 600px;}
  .table tr th {padding: .5rem; text-align: center; text-transform: uppercase; background-color: #57d3ff; color: #333;}
  .table tr td {padding: .5rem;}
  .table tr td.td-label {font-weight: bold; min-width: 200px; width: 200px}
  .table tr td.td-title {font-weight: bold; text-align: center;}
  .table tr td.td-title.name {min-width: 300px; width: 300px}
  .table tr td.td-title.year {min-width: 200px; width: 200px}
  .table tr td.td-title.option {min-width: 100px; width: 100px}
  .table tr td.td-title.question {min-width: 400px; width: 400px}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/applicant/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/tw/applicant/form-1.blade.php ENDPATH**/ ?>