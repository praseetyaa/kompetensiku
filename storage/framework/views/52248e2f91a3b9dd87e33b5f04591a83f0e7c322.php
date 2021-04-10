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
      <form method="post" action="/applicant/tahap-wawancara/riwayat-hidup/save">
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
            <a class="nav-link bg-warning" href="/applicant/tahap-wawancara/data-diri"><i class="fas fa-user mr-2"></i> Data Diri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/applicant/tahap-wawancara/riwayat-hidup"><i class="fas fa-school mr-2"></i> Riwayat Hidup</a>
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
                <th colspan="2">Pendidikan Formal</th>
              </tr>
              <tr>
                <td colspan="2">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-title name">Nama Sekolah</td>
                      <td class="td-title name">Jurusan</td>
                      <td class="td-title">Alamat Sekolah</td>
                      <td class="td-title year">Tahun</td>
                      <td class="td-title option">Opsi</td>
                    </tr>
                    <?php if($pelamar->pendidikan_formal != null): ?>
                      <?php $__currentLoopData = $pelamar->pendidikan_formal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr class="tr-pendidikan-formal" data-id="<?php echo e(($key+1)); ?>">
                        <td><input type="text" name="pendidikan_formal[<?php echo e(($key+1)); ?>][nama_sekolah]" class="form-control form-control-sm input-pendidikan-formal" value="<?php echo e($data['nama_sekolah']); ?>"></td>
                        <td><input type="text" name="pendidikan_formal[<?php echo e(($key+1)); ?>][jurusan_sekolah]" class="form-control form-control-sm input-pendidikan-formal" value="<?php echo e($data['jurusan_sekolah']); ?>"></td>
                        <td><input type="text" name="pendidikan_formal[<?php echo e(($key+1)); ?>][alamat_sekolah]" class="form-control form-control-sm input-pendidikan-formal" value="<?php echo e($data['alamat_sekolah']); ?>"></td>
                        <td><input type="text" name="pendidikan_formal[<?php echo e(($key+1)); ?>][tahun_sekolah]" class="form-control form-control-sm input-pendidikan-formal" value="<?php echo e($data['tahun_sekolah']); ?>"></td>
                        <td align="center">
                          <a href="#" class="btn btn-sm btn-outline-primary mr-2 mb-2 btn-add-line" data-id="<?php echo e(($key+1)); ?>" data-tr="tr-pendidikan-formal" data-input="input-pendidikan-formal" title="Tambah"><i class="fa fa-plus"></i></a>
                          <a href="#" class="btn btn-sm btn-outline-danger mb-2 btn-remove-line" data-id="<?php echo e(($key+1)); ?>" data-tr="tr-pendidikan-formal" data-input="input-pendidikan-formal" title="Hapus"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                      <tr class="tr-pendidikan-formal" data-id="1">
                        <td><input type="text" name="pendidikan_formal[1][nama_sekolah]" class="form-control form-control-sm input-pendidikan-formal"></td>
                        <td><input type="text" name="pendidikan_formal[1][jurusan_sekolah]" class="form-control form-control-sm input-pendidikan-formal"></td>
                        <td><input type="text" name="pendidikan_formal[1][alamat_sekolah]" class="form-control form-control-sm input-pendidikan-formal"></td>
                        <td><input type="text" name="pendidikan_formal[1][tahun_sekolah]" class="form-control form-control-sm input-pendidikan-formal"></td>
                        <td align="center">
                          <a href="#" class="btn btn-sm btn-outline-primary mr-2 mb-2 btn-add-line" data-id="1" data-tr="tr-pendidikan-formal" data-input="input-pendidikan-formal" title="Tambah"><i class="fa fa-plus"></i></a>
                          <a href="#" class="btn btn-sm btn-outline-danger mb-2 btn-remove-line" data-id="1" data-tr="tr-pendidikan-formal" data-input="input-pendidikan-formal" title="Hapus"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endif; ?>
                  </table>
                </td>
              </tr>
              <tr>
                <th colspan="2">Pendidikan Non Formal</th>
              </tr>
              <tr>
                <td colspan="2">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-title name">Nama Kursus / Pelatihan</td>
                      <td class="td-title year">Tahun</td>
                      <td class="td-title">Tempat</td>
                      <td class="td-title">Keterangan</td>
                      <td class="td-title option">Opsi</td>
                    </tr>
                    <?php if($pelamar->pendidikan_non_formal != null): ?>
                      <?php $__currentLoopData = $pelamar->pendidikan_non_formal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="tr-pendidikan-non-formal" data-id="<?php echo e(($key+1)); ?>">
                          <td><input type="text" name="pendidikan_non_formal[<?php echo e(($key+1)); ?>][nama_pnf]" class="form-control form-control-sm input-pendidikan-non-formal" value="<?php echo e($data['nama_pnf']); ?>"></td>
                          <td><input type="text" name="pendidikan_non_formal[<?php echo e(($key+1)); ?>][tahun_pnf]" class="form-control form-control-sm input-pendidikan-non-formal" value="<?php echo e($data['tahun_pnf']); ?>"></td>
                          <td><input type="text" name="pendidikan_non_formal[<?php echo e(($key+1)); ?>][tempat_pnf]" class="form-control form-control-sm input-pendidikan-non-formal" value="<?php echo e($data['tempat_pnf']); ?>"></td>
                          <td><input type="text" name="pendidikan_non_formal[<?php echo e(($key+1)); ?>][keterangan_pnf]" class="form-control form-control-sm input-pendidikan-non-formal" value="<?php echo e($data['keterangan_pnf']); ?>"></td>
                          <td align="center">
                            <a href="#" class="btn btn-sm btn-outline-primary mr-2 mb-2 btn-add-line" data-id="<?php echo e(($key+1)); ?>" data-tr="tr-pendidikan-non-formal" data-input="input-pendidikan-non-formal" title="Tambah"><i class="fa fa-plus"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-danger mb-2 btn-remove-line" data-id="<?php echo e(($key+1)); ?>" data-tr="tr-pendidikan-non-formal" data-input="input-pendidikan-non-formal" title="Hapus"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                      <tr class="tr-pendidikan-non-formal" data-id="1">
                        <td><input type="text" name="pendidikan_non_formal[1][nama_pnf]" class="form-control form-control-sm input-pendidikan-non-formal"></td>
                        <td><input type="text" name="pendidikan_non_formal[1][tahun_pnf]" class="form-control form-control-sm input-pendidikan-non-formal"></td>
                        <td><input type="text" name="pendidikan_non_formal[1][tempat_pnf]" class="form-control form-control-sm input-pendidikan-non-formal"></td>
                        <td><input type="text" name="pendidikan_non_formal[1][keterangan_pnf]" class="form-control form-control-sm input-pendidikan-non-formal"></td>
                        <td align="center">
                          <a href="#" class="btn btn-sm btn-outline-primary mr-2 mb-2 btn-add-line" data-id="1" data-tr="tr-pendidikan-non-formal" data-input="input-pendidikan-non-formal" title="Tambah"><i class="fa fa-plus"></i></a>
                          <a href="#" class="btn btn-sm btn-outline-danger mb-2 btn-remove-line" data-id="1" data-tr="tr-pendidikan-non-formal" data-input="input-pendidikan-non-formal" title="Hapus"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endif; ?>
                  </table>
                </td>
              </tr>
              <tr>
                <th colspan="2">Keahlian</th>
              </tr>
              <tr>
                <td colspan="2">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-title name">Jenis Keahlian</td>
                      <td class="td-title" colspan="3">Tingkat Penguasaan</td>
                    </tr>
                    <?php if($pelamar->keahlian != null): ?>
                      <?php $__currentLoopData = $pelamar->keahlian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="tr-keahlian">
                          <td><?php echo e($data['keahlian']); ?> <input type="hidden" name="keahlian[<?php echo e(($key+1)); ?>][keahlian]" value="<?php echo e($data['keahlian']); ?>"></td>
                          <td align="center"><input type="radio" name="keahlian[<?php echo e(($key+1)); ?>][skor]" value="3" <?php echo e($data['skor'] == '3' ? 'checked' : ''); ?>> Baik</td>
                          <td align="center"><input type="radio" name="keahlian[<?php echo e(($key+1)); ?>][skor]" value="2" <?php echo e($data['skor'] == '2' ? 'checked' : ''); ?>> Cukup</td>
                          <td align="center"><input type="radio" name="keahlian[<?php echo e(($key+1)); ?>][skor]" value="1" <?php echo e($data['skor'] == '1' ? 'checked' : ''); ?>> Kurang</td>
                        </tr>
                        <?php if($errors->has('keahlian.'.($key+1).'.skor')): ?>
                        <tr>
                          <td colspan="4" align="center" class="p-0"><small class="text-danger font-weight-bold"><?php echo e(str_replace(($key+1), $data['keahlian'], str_replace("skor", "", str_replace(".", " ", ucfirst($errors->first('keahlian.'.($key+1).'.skor')))))); ?></small></td>
                        </tr>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                      <?php $__currentLoopData = $keahlian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="tr-keahlian">
                          <td><?php echo e($value); ?> <input type="hidden" name="keahlian[<?php echo e(($key+1)); ?>][keahlian]" value="<?php echo e($value); ?>"></td>
                          <td align="center"><input type="radio" name="keahlian[<?php echo e(($key+1)); ?>][skor]" value="3" <?php echo e(old('keahlian.'.($key+1).'.skor') == '3' ? 'checked' : ''); ?>> Baik</td>
                          <td align="center"><input type="radio" name="keahlian[<?php echo e(($key+1)); ?>][skor]" value="2" <?php echo e(old('keahlian.'.($key+1).'.skor') == '2' ? 'checked' : ''); ?>> Cukup</td>
                          <td align="center"><input type="radio" name="keahlian[<?php echo e(($key+1)); ?>][skor]" value="1" <?php echo e(old('keahlian.'.($key+1).'.skor') == '1' ? 'checked' : ''); ?>> Kurang</td>
                        </tr>
                        <?php if($errors->has('keahlian.'.($key+1).'.skor')): ?>
                        <tr>
                          <td colspan="4" align="center" class="p-0"><small class="text-danger font-weight-bold"><?php echo e(str_replace(($key+1), $value, str_replace("skor", "", str_replace(".", " ", ucfirst($errors->first('keahlian.'.($key+1).'.skor')))))); ?></small></td>
                        </tr>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </table>
                </td>
              </tr>
              <tr>
                <th colspan="2">Pengalaman Kerja</th>
              </tr>
              <tr>
                <td colspan="2">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-title name">Nama Perusahaan</td>
                      <td class="td-title name">Jabatan</td>
                      <td class="td-title year">Masa Kerja</td>
                      <td class="td-title year">Gaji</td>
                      <td class="td-title">Alasan Keluar</td>
                      <td class="td-title option">Opsi</td>
                    </tr>
                    <?php if($pelamar->pengalaman_kerja != null): ?>
                      <?php $__currentLoopData = $pelamar->pengalaman_kerja; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="tr-pengalaman-kerja" data-id="<?php echo e(($key+1)); ?>">
                          <td><input type="text" name="pengalaman_kerja[<?php echo e(($key+1)); ?>][nama_perusahaan]" class="form-control form-control-sm input-pengalaman-kerja" value="<?php echo e($data['nama_perusahaan']); ?>"></td>
                          <td><input type="text" name="pengalaman_kerja[<?php echo e(($key+1)); ?>][jabatan_di_perusahaan]" class="form-control form-control-sm input-pengalaman-kerja" value="<?php echo e($data['jabatan_di_perusahaan']); ?>"></td>
                          <td><input type="text" name="pengalaman_kerja[<?php echo e(($key+1)); ?>][masa_kerja]" class="form-control form-control-sm input-pengalaman-kerja" value="<?php echo e($data['masa_kerja']); ?>"></td>
                          <td><input type="text" name="pengalaman_kerja[<?php echo e(($key+1)); ?>][gaji]" class="form-control form-control-sm input-pengalaman-kerja" value="<?php echo e($data['gaji']); ?>"></td>
                          <td><input type="text" name="pengalaman_kerja[<?php echo e(($key+1)); ?>][alasan_keluar]" class="form-control form-control-sm input-pengalaman-kerja" value="<?php echo e($data['alasan_keluar']); ?>"></td>
                          <td align="center">
                            <a href="#" class="btn btn-sm btn-outline-primary mr-2 mb-2 btn-add-line" data-id="<?php echo e(($key+1)); ?>" data-tr="tr-pengalaman-kerja" data-input="input-pengalaman-kerja" title="Tambah"><i class="fa fa-plus"></i></a>
                          <a href="#" class="btn btn-sm btn-outline-danger mb-2 btn-remove-line" data-id="<?php echo e(($key+1)); ?>" data-tr="tr-pengalaman-kerja" data-input="input-pengalaman-kerja" title="Hapus"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                      <tr class="tr-pengalaman-kerja" data-id="1">
                        <td><input type="text" name="pengalaman_kerja[1][nama_perusahaan]" class="form-control form-control-sm input-pengalaman-kerja"></td>
                        <td><input type="text" name="pengalaman_kerja[1][jabatan_di_perusahaan]" class="form-control form-control-sm input-pengalaman-kerja"></td>
                        <td><input type="text" name="pengalaman_kerja[1][masa_kerja]" class="form-control form-control-sm input-pengalaman-kerja"></td>
                        <td><input type="text" name="pengalaman_kerja[1][gaji]" class="form-control form-control-sm input-pengalaman-kerja"></td>
                        <td><input type="text" name="pengalaman_kerja[1][alasan_keluar]" class="form-control form-control-sm input-pengalaman-kerja"></td>
                        <td align="center">
                          <a href="#" class="btn btn-sm btn-outline-primary mr-2 mb-2 btn-add-line" data-id="1" data-tr="tr-pengalaman-kerja" data-input="input-pengalaman-kerja" title="Tambah"><i class="fa fa-plus"></i></a>
                          <a href="#" class="btn btn-sm btn-outline-danger mb-2 btn-remove-line" data-id="1" data-tr="tr-pengalaman-kerja" data-input="input-pengalaman-kerja" title="Hapus"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endif; ?>
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

    // Button add line
    $(document).on("click", ".btn-add-line", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var tr = $(this).data("tr");
      var input = $(this).data("input");
      var length = $("." + tr).length;
      var inputElement = $("." + tr + "[data-id=" + id + "] " + "." + input);
      var html = '';
      html += '<tr class="' + tr + '" data-id="' + (length+1) + '">';
      inputElement.each(function(key, elem){
        var attr = $(elem).attr("name");
        var newName = attr.replace(length, (length+1));
        html += '<td><input type="text" name="' + newName + '" class="form-control form-control-sm ' + input + '"></td>';
      });
      html += '<td align="center">';
      html += '<a href="#" class="btn btn-sm btn-outline-primary mr-2 mb-2 btn-add-line" data-id="' + (length+1) + '" data-tr="' + tr + '" data-input="' + input + '" title="Tambah"><i class="fa fa-plus"></i></a>';
      html += '<a href="#" class="btn btn-sm btn-outline-danger mb-2 btn-remove-line" data-id="' + (length+1) + '" data-tr="' + tr + '" data-input="' + input + '" title="Hapus"><i class="fa fa-trash"></i></a>';
      html += '</td>';
      html += '</tr>';
      $("." + tr + ":last-child").after(html);
    });

    // Button remove line / remove value
    $(document).on("click", ".btn-remove-line", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var tr = $(this).data("tr");
      var input = $(this).data("input");
      if(id == 1){
        var inputElement = $("." + tr + "[data-id=" + id + "] " + "." + input);
        inputElement.each(function(key, elem){
          $(elem).val(null);
        });
      }
      else{
        $("." + tr + "[data-id=" + id + "]").remove();
      }
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
<?php echo $__env->make('template/applicant/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/tw/applicant/form-2.blade.php ENDPATH**/ ?>