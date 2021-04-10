<?php $__env->startSection('content'); ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Profil Pelamar</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Profil Pelamar</h6>
      <a class="btn btn-sm btn-primary" href="/admin/pelamar/edit/<?php echo e($pelamar->id_pelamar); ?>">
        <i class="fas fa-edit fa-sm fa-fw text-gray-400"></i> Edit Pelamar
      </a>
    </div>
    <div class="card-body">
      <form method="post" action="#">
        <?php echo e(csrf_field()); ?>

        <?php if(Session::get('message') != null): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(Session::get('message')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <div class="form-row">
          <div class="col-auto p-3 border border-muted mb-2 mr-2">
            <img src="<?php echo e(asset('assets/images/pas-foto/'.$pelamar->pas_foto)); ?>" class="img-fluid" width="200">
          </div>
          <div class="col">
            <div class="row">
              <div class="col-sm-auto ml-sm-auto">
                <p class="font-weight-bold text-md-right">
                  <small>Melamar tanggal <?php echo e(setFullDate($pelamar->created_at)); ?>, pukul <?php echo e(date('H:i:s', strtotime($pelamar->created_at))); ?></small>
                  <br>
                  Untuk Jabatan: <?php echo e($pelamar->posisi); ?>

                </p>
              </div>
            </div>
          </div>
        </div>
        <ul class="nav nav-pills mt-3 mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" href="/admin/pelamar/profile/<?php echo e($pelamar->id_pelamar); ?>"><i class="fas fa-user mr-2"></i> Identitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-warning" href="/admin/pelamar/profile/<?php echo e($pelamar->id_pelamar); ?>/disc"><i class="fas fa-clipboard mr-2"></i> Hasil Tes</a>
          </li>
        </ul>
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
                      <td><?php echo e($pelamar->nama_lengkap); ?></td>
                    </tr>
                    <tr>
                      <td class="td-label">Tempat, Tanggal Lahir</td>
                      <td>:</td>
                      <td><?php echo e($pelamar->tempat_lahir); ?>, <?php echo e(setFullDate($pelamar->tanggal_lahir)); ?></td>
                    </tr>
                    <tr>
                      <td class="td-label">Jenis Kelamin</td>
                      <td>:</td>
                      <td><?php echo e($pelamar->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan'); ?></td>
                    </tr>
                    <tr>
                      <td class="td-label">Nomor HP</td>
                      <td>:</td>
                      <td><?php echo e($pelamar->nomor_hp); ?></td>
                    </tr>
                    <tr>
                      <td class="td-label">Email</td>
                      <td>:</td>
                      <td><?php echo e($pelamar->email); ?></td>
                    </tr>
                    <tr>
                      <td class="td-label">Alamat</td>
                      <td>:</td>
                      <td><?php echo e($pelamar->alamat); ?></td>
                    </tr>
                  </table>
                </td>
                <td width="50%">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-label">Agama</td>
                      <td width="10">:</td>
                      <td><?php echo e($pelamar->agama); ?></td>
                    </tr>
                    <tr>
                      <td class="td-label">Umur</td>
                      <td>:</td>
                      <td><?php echo e($pelamar->umur); ?></td>
                    </tr>
                    <tr>
                      <td class="td-label">No. KTP</td>
                      <td>:</td>
                      <td><?php echo e($pelamar->nomor_ktp); ?></td>
                    </tr>
                    <tr>
                      <td class="td-label">Nomor Telepon</td>
                      <td>:</td>
                      <td><?php echo e($pelamar->nomor_telepon); ?></td>
                    </tr>
                    <tr>
                      <td class="td-label">Status Hubungan</td>
                      <td>:</td>
                      <td><?php if($pelamar->status_hubungan == 1): ?> Lajang <?php elseif($pelamar->status_hubungan == 2): ?> Menikah <?php elseif($pelamar->status_hubungan == 3): ?> Janda / Duda <?php endif; ?></td>
                    </tr>
                    <tr>
                      <td class="td-label">Kode Pos</td>
                      <td>:</td>
                      <td><?php echo e($pelamar->kode_pos); ?></td>
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
                      <td><?php echo e($pelamar->data_darurat['nama_orang_tua']); ?></td>
                    </tr>
                    <tr>
                      <td class="td-label">Alamat</td>
                      <td>:</td>
                      <td><?php echo e($pelamar->data_darurat['alamat_orang_tua']); ?></td>
                    </tr>
                  </table>
                </td>
                <td width="50%">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-label">Nomor HP</td>
                      <td width="10">:</td>
                      <td><?php echo e($pelamar->data_darurat['nomor_hp_orang_tua']); ?></td>
                    </tr>
                    <tr>
                      <td class="td-label">Pekerjaan</td>
                      <td width="10">:</td>
                      <td><?php echo e($pelamar->data_darurat['pekerjaan_orang_tua']); ?></td>
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
                      <td><?php echo e($pelamar->akun_sosmed['Facebook']); ?></td>
                    </tr>
                    <tr>
                      <td class="td-label">Twitter</td>
                      <td width="10">:</td>
                      <td><?php echo e($pelamar->akun_sosmed['Twitter']); ?></td>
                    </tr>
                  </table>
                </td>
                <td width="50%">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-label">Instagram</td>
                      <td width="10">:</td>
                      <td><?php echo e($pelamar->akun_sosmed['Instagram']); ?></td>
                    </tr>
                    <tr>
                      <td class="td-label">YouTube</td>
                      <td width="10">:</td>
                      <td><?php echo e($pelamar->akun_sosmed['YouTube']); ?></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <th colspan="2">Pendidikan Formal</th>
              </tr>
              <tr>
                <td colspan="2">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-title number">No.</td>
                      <td class="td-title name">Nama Sekolah</td>
                      <td class="td-title name">Jurusan</td>
                      <td class="td-title">Alamat Sekolah</td>
                      <td class="td-title year">Tahun</td>
                    </tr>
                    <?php if($pelamar->pendidikan_formal != null): ?>
                      <?php $__currentLoopData = $pelamar->pendidikan_formal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td align="center"><?php echo e(($key+1)); ?></td>
                          <td><?php echo e($data['nama_sekolah']); ?></td>
                          <td><?php echo e($data['jurusan_sekolah']); ?></td>
                          <td><?php echo e($data['alamat_sekolah']); ?></td>
                          <td><?php echo e($data['tahun_sekolah']); ?></td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="5" align="center"><span class="text-danger">Data tidak tersedia.</span></td>
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
                      <td class="td-title number">No.</td>
                      <td class="td-title name">Nama Kursus / Pelatihan</td>
                      <td class="td-title year">Tahun</td>
                      <td class="td-title">Tempat</td>
                      <td class="td-title">Keterangan</td>
                    </tr>
                    <?php if($pelamar->pendidikan_non_formal != null): ?>
                      <?php $__currentLoopData = $pelamar->pendidikan_non_formal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td align="center"><?php echo e(($key+1)); ?></td>
                          <td><?php echo e($data['nama_pnf']); ?></td>
                          <td><?php echo e($data['tahun_pnf']); ?></td>
                          <td><?php echo e($data['tempat_pnf']); ?></td>
                          <td><?php echo e($data['keterangan_pnf']); ?></td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="5" align="center"><span class="text-danger">Data tidak tersedia.</span></td>
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
                      <td class="td-title number">No.</td>
                      <td class="td-title name">Jenis Keahlian</td>
                      <td class="td-title">Tingkat Penguasaan</td>
                    </tr>
                    <?php if($pelamar->keahlian != null): ?>
                      <?php $__currentLoopData = $pelamar->keahlian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td align="center"><?php echo e(($key+1)); ?></td>
                          <td><?php echo e($data['keahlian']); ?></td>
                          <td><?php if($data['skor'] == 3): ?> Baik <?php elseif($data['skor'] == 2): ?> Cukup <?php elseif($data['skor'] == 1): ?> Kurang <?php endif; ?></td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                      <?php $__currentLoopData = $keahlian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td align="center"><?php echo e(($key+1)); ?></td>
                          <td><?php echo e($value); ?></td>
                          <td>-</td>
                        </tr>
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
                      <td class="td-title number">No.</td>
                      <td class="td-title name">Nama Perusahaan</td>
                      <td class="td-title name">Jabatan</td>
                      <td class="td-title year">Masa Kerja</td>
                      <td class="td-title year">Gaji</td>
                      <td class="td-title">Alasan Keluar</td>
                    </tr>
                    <?php if($pelamar->pengalaman_kerja != null): ?>
                      <?php $__currentLoopData = $pelamar->pengalaman_kerja; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td align="center"><?php echo e(($key+1)); ?></td>
                          <td><?php echo e($data['nama_perusahaan']); ?></td>
                          <td><?php echo e($data['jabatan_di_perusahaan']); ?></td>
                          <td><?php echo e($data['masa_kerja']); ?></td>
                          <td><?php echo e($data['gaji']); ?></td>
                          <td><?php echo e($data['alasan_keluar']); ?></td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="6" align="center"><span class="text-danger">Data tidak tersedia.</span></td>
                      </tr>
                    <?php endif; ?>
                  </table>
                </td>
              </tr>
              <tr>
                <th colspan="2">Lain-Lain</th>
              </tr>
              <tr>
                <td colspan="2">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-title number">No.</td>
                      <td class="td-title question">Pertanyaan</td>
                      <td class="td-title">Jawaban</td>
                    </tr>
                    <?php if($pelamar->pertanyaan != null): ?>
                      <?php $__currentLoopData = $pelamar->pertanyaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td align="center"><?php echo e(($key+1)); ?></td>
                          <td><?php echo e($data['pertanyaan']); ?></td>
                          <td><?php echo e($data['jawaban']); ?></td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                      <?php $__currentLoopData = $pertanyaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td align="center"><?php echo e(($key+1)); ?></td>
                          <td><?php echo e($value); ?></td>
                          <td><span class="text-danger">Belum dijawab</span></td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </table>
                </td>
              </tr>
              <tr>
                <th colspan="2">Berkas</th>
              </tr>
              <tr>
                <td colspan="2">
                  <table class="table mb-0">
                    <tr>
                      <td class="td-label">Pas Foto</td>
                      <td width="10">:</td>
                      <td><a class="btn btn-sm btn-primary" href="<?php echo e(asset('assets/images/pas-foto/'.$pelamar->pas_foto)); ?>" target="_blank"><i class="fa fa-camera mr-2"></i> Lihat Foto</a></td>
                    </tr>
                    <tr>
                      <td class="td-label">Foto Ijazah</td>
                      <td width="10">:</td>
                      <td><a class="btn btn-sm btn-primary" href="<?php echo e(asset('assets/images/foto-ijazah/'.$pelamar->foto_ijazah)); ?>" target="_blank"><i class="fa fa-camera mr-2"></i> Lihat Foto</a></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <?php if($tw->hasil == 99): ?>
        <div class="form-group mt-3">
          <input type="hidden" name="id_pelamar" value="<?php echo e($pelamar->id_pelamar); ?>">
          <input type="hidden" name="id_lowongan" value="<?php echo e($pelamar->id_lowongan); ?>">
          <button type="button" class="btn btn-success btn-submit" id="lolos">Lolos</button>
          <button type="button" class="btn btn-danger btn-submit" id="tidak-lolos">Tidak Lolos</button>
          <a href="/admin/pelamar" class="btn btn-secondary">Kembali</a>
        </div>
        <?php endif; ?>
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css" integrity="sha256-lBtf6tZ+SwE/sNMR7JFtCyD44snM3H2FrkB/W400cJA=" crossorigin="anonymous" />
<style type="text/css">
  .nav-pills .nav-link {border-radius: 0;}
  .table {min-width: 600px;}
  .table tr th {padding: .5rem; text-align: center; text-transform: uppercase; background-color: #57d3ff; color: #333;}
  .table tr td {padding: .5rem;}
  .table tr td.td-label {font-weight: bold; min-width: 200px; width: 200px}
  .table tr td.td-title {font-weight: bold; text-align: center;}
  .table tr td.td-title.number {min-width: 60px; width: 60px}
  .table tr td.td-title.name {min-width: 300px; width: 300px}
  .table tr td.td-title.year {min-width: 200px; width: 200px}
  .table tr td.td-title.option {min-width: 100px; width: 100px}
  .table tr td.td-title.question {min-width: 450px; width: 450px}
</style>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js" integrity="sha256-LPgEyZbedErJpp8m+3uasZXzUlSl9yEY4MMCEN9ialU=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(function(){
    $('input[name=tanggal]').datepicker({
      format: 'yyyy-mm-dd',
    });

    $("input[name=jam]").clockpicker();

    $(document).on("click", ".btn-show-datepicker", function(e){
      e.preventDefault();
      $('input[name=tanggal]').focus();
    });

    $(document).on("click", ".btn-show-clockpicker", function(e){
      e.preventDefault();
      $('input[name=jam]').focus();
    })
  });

  // Loloskan pelamar
  $(document).on("click", "#lolos", function(e){
    e.preventDefault();
    var id_pelamar = $("input[name=id_pelamar]").val();
    var id_lowongan = $("input[name=id_lowongan]").val();
    var ask = confirm("Anda yakin ingin meloloskan pelamar ini dari tes wawancara?");
    if(ask){
      $.ajax({
        type: "post",
        url: "/admin/tahap-wawancara/is-pass",
        data: {_token: "<?php echo e(csrf_token()); ?>", id_pelamar: id_pelamar, id_lowongan: id_lowongan},
        success: function(response){
          if(response == "Seleksi berhasil!"){
            alert(response);
            window.location.href = '/admin/tahap-wawancara';
          }
        }
      });
    }
  });

  // Tidak loloskan pelamar
  $(document).on("click", "#tidak-lolos", function(e){
    e.preventDefault();
    var id_pelamar = $("input[name=id_pelamar]").val();
    var id_lowongan = $("input[name=id_lowongan]").val();
    var ask = confirm("Anda yakin ingin mentidakloloskan pelamar ini dari tes wawancara?");
    if(ask){
      $.ajax({
        type: "post",
        url: "/admin/tahap-wawancara/is-not-pass",
        data: {_token: "<?php echo e(csrf_token()); ?>", id_pelamar: id_pelamar, id_lowongan: id_lowongan},
        success: function(response){
          if(response == "Seleksi berhasil!"){
            alert(response);
            window.location.href = '/admin/tahap-wawancara';
          }
        }
      });
    }
  });
</script>

<?php if(count($errors) > 0): ?>
<script type="text/javascript">
  $(function(){
    // Show modal when the page is loaded
    $("#TimeTestModal").modal("toggle");
  });
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\recruitment\resources\views/pelamar/admin/profile-2.blade.php ENDPATH**/ ?>