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
                <h4 class="page-title">Data Materi E-Competence</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/e-competence">Materi E-Competence</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Materi E-Competence</li>
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
                    <div class="card-title border-bottom">
                        <div class="row">
                            <div class="col-12 col-sm py-1 mb-2 mb-sm-0 text-center text-sm-left">
                                <h5 class="mb-0">Data Materi E-Competence</h5>
                            </div>
                            <?php if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3): ?>
                            <div class="col-12 col-sm-auto text-center text-sm-left">
								<?php if($directory->folder_parent == 0): ?>
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add-folder"><i class="fa fa-folder mr-2"></i> Tambah Folder</a>
								<?php endif; ?>
                                <a href="/admin/e-competence/upload?dir=<?php echo e($directory->dir_folder); ?>" class="btn btn-sm btn-primary"><i class="fa fa-upload mr-2"></i> Tambah File</a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body">
						<div class="col-12 mb-4">
							<?php if($directory->folder_parent == 0): ?>
								<strong>Folder:</strong> Home
							<?php elseif($directory->folder_parent == 1): ?>
								<strong>Folder:</strong><br><a href="/admin/e-competence?dir=/">Home</a> &raquo; <?php echo e($directory->nama_folder); ?>

							<?php endif; ?>
						</div>
                        <?php if(Session::get('message') != null): ?>
                            <div class="alert alert-success alert-dismissible mb-4 fade show" role="alert">
                                <?php echo e(Session::get('message')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
						<div class="table-responsive">
							<table id="table-produk" class="table table-hover table-bordered">
								<thead>
									<tr>
										<th>Nama</th>
										<th width="80">Tanggal</th>
                                        <?php if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3): ?>
                                        <th width="40">Opsi</th>
                                        <?php endif; ?>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="data-folder" data-id="<?php echo e($folder->id_folder); ?>">
										<td class="td-name" data-id="<?php echo e($folder->id_folder); ?>" data-value="<?php echo e($folder->nama_folder); ?>">
											<a href="/admin/e-competence?dir=<?php echo e($folder->dir_folder); ?>">
												<i class="far fa-folder mr-1" style="font-size: 20px;"></i>
												<?php echo e($folder->nama_folder); ?>

											</a> (<?php echo e(count_files($folder->id_folder, $folder->jenis_folder)); ?> file)
										</td>
                                        <td>
											<span title="<?php echo e(date('Y-m-d H:i:s', strtotime($folder->folder_at))); ?>" style="text-decoration: underline; cursor: help;">
												<?php echo e(date('Y-m-d', strtotime($folder->folder_at))); ?>

											</span>
										</td>
                                        <?php if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3): ?>
										<td>
											<button type="button" class="btn btn-warning btn-sm btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opsi</button>
											<div class="dropdown-menu dropdown-menu-right shadow">
											  <!--<a class="dropdown-item btn-move" href="#" data-id="<?php echo e($folder->id_folder); ?>" data-type="folder" data-toggle="modal" data-target="#modal-move">Pindah</a>-->
											  <a class="dropdown-item btn-edit-folder" href="#" data-id="<?php echo e($folder->id_folder); ?>" data-toggle="modal" data-target="#modal-edit-folder">Ubah Nama</a>
											  <a class="dropdown-item btn-delete-folder" href="#" data-id="<?php echo e($folder->id_folder); ?>">Hapus</a>
											</div>
										</td>
                                        <?php endif; ?>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="data-file" data-id="<?php echo e($file->id_file); ?>">
										<td class="td-name" data-id="<?php echo e($file->id_file); ?>" data-value="<?php echo e($file->nama_file); ?>">
											<a href="/admin/e-competence/view/<?php echo e($file->id_file); ?>" target="_blank">
												<i class="far fa-file-pdf mr-1" style="font-size: 20px;"></i>
												<?php echo e($file->nama_file); ?>

											</a> (<?php echo e(count_pages($file->url)); ?> halaman)
										</td>
                                        <td>
											<span title="<?php echo e(date('Y-m-d H:i:s', strtotime($file->uploaded_at))); ?>" style="text-decoration: underline; cursor: help;">
												<?php echo e(date('Y-m-d', strtotime($file->uploaded_at))); ?>

											</span>
										</td>
                                        <?php if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3): ?>
										<td>
											<button type="button" class="btn btn-warning btn-sm btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opsi</button>
											<div class="dropdown-menu dropdown-menu-right shadow">
											  <a class="dropdown-item btn-move" href="#" data-id="<?php echo e($file->id_file); ?>" data-type="file" data-toggle="modal" data-target="#modal-move">Pindah</a>
											  <a class="dropdown-item btn-edit-file" href="#" data-id="<?php echo e($file->id_file); ?>" data-toggle="modal" data-target="#modal-edit-file">Ubah Nama</a>
											  <a class="dropdown-item btn-delete-file" href="#" data-id="<?php echo e($file->id_file); ?>">Hapus</a>
											</div>
										</td>
                                        <?php endif; ?>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
                            <form id="form-delete-folder" class="d-none" method="post" action="/admin/folder/delete">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id" id="id-folder">
                            </form>
                            <form id="form-delete-file" class="d-none" method="post" action="/admin/e-competence/delete">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id" id="id-file">
                            </form>
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

<!-- Modal Tambah Folder -->
<div class="modal fade" id="modal-add-folder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Folder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-folder" method="post" action="/admin/folder/store">
                    <?php echo e(csrf_field()); ?>

					<input type="hidden" name="jenis_folder" value="3">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Nama Folder <span class="text-danger">*</span></label>
                            <input type="text" name="nama_folder" class="form-control <?php echo e($errors->has('nama_folder') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Nama Folder" value="<?php echo e(old('nama_folder')); ?>">
                            <?php if($errors->has('nama_folder')): ?>
                            <small class="text-danger"><?php echo e(ucfirst($errors->first('nama_folder'))); ?></small>
                            <?php endif; ?>
                        </div>
                        <input type="hidden" name="folder_parent" value="<?php echo e($directory->id_folder); ?>">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-submit-add-folder">Simpan</button>
                <button type="button" class="btn btn-danger"data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Tambah Folder -->

<!-- Modal Pindah Folder -->
<div class="modal fade" id="modal-move" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pindahkan ke...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-move" method="post" action="/admin/folder/move">
                    <?php echo e(csrf_field()); ?>

					<input type="hidden" name="type" id="move-type">
					<input type="hidden" name="destination" id="destination">
					<input type="hidden" name="id" id="id-product">
                    <div class="row">
                        <div class="form-group col-md-12">
							<table class="table table-hovered" id="table-available-folders">
								<?php $__currentLoopData = $available_folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $available_folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td class="btn-available-folder" data-id="<?php echo e($available_folder->id_folder); ?>" style="<?php echo e($available_folder->folder_parent != 0 ? 'padding-left: 1.5rem!important' : ''); ?>"><i class="fa fa-folder mr-2"></i> <?php echo e($available_folder->nama_folder); ?></td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</table>
						</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-submit-move" disabled>Pilih</button>
                <button type="button" class="btn btn-danger"data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Pindah Folder -->

<!-- Modal Edit Folder -->
<div class="modal fade" id="modal-edit-folder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Folder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-folder" method="post" action="/admin/folder/update">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Nama Folder <span class="text-danger">*</span></label>
                            <input type="text" name="nama_folder2" class="form-control <?php echo e($errors->has('nama_folder2') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Nama Folder" value="<?php echo e(old('nama_folder2')); ?>">
                            <?php if($errors->has('nama_folder2')): ?>
                            <small class="text-danger"><?php echo e(ucfirst($errors->first('nama_folder2'))); ?></small>
                            <?php endif; ?>
                        </div>
                        <input type="hidden" name="id_folder">
                        <input type="hidden" name="folder_parent" value="<?php echo e($directory->id_folder); ?>">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-submit-edit-folder">Simpan</button>
                <button type="button" class="btn btn-danger"data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit Folder -->

<!-- Modal Edit File -->
<div class="modal fade" id="modal-edit-file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-file" method="post" action="/admin/e-competence/update">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="nama_produk" class="form-control <?php echo e($errors->has('nama_produk') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Nama Produk" value="<?php echo e(old('nama_produk')); ?>">
                            <?php if($errors->has('nama_produk')): ?>
                            <small class="text-danger"><?php echo e(ucfirst($errors->first('nama_produk'))); ?></small>
                            <?php endif; ?>
                        </div>
                        <input type="hidden" name="id_produk">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-submit-edit-file">Simpan</button>
                <button type="button" class="btn btn-danger"data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit File -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script src="<?php echo e(asset('templates/matrix-admin/assets/extra-libs/DataTables/datatables.min.js')); ?>"></script>
<script type="text/javascript">
    // DataTable
    $('#table-produk').DataTable();
</script>
	
<script type="text/javascript">
	// Validation Add Folder
	<?php if($errors->has('nama_folder')): ?>
		$("#modal-add-folder").modal("show");
	<?php endif; ?>

    // Close Modal Add Folder
    $('#modal-add-folder').on('hidden.bs.modal', function(e){
        $("#modal-add-folder").find("input[type=text]").val(null);
    });

    // Button Submit Add Folder
    $(document).on("click", "#btn-submit-add-folder", function(e){
        $("#form-add-folder").submit();
    });
</script>
	
<script type="text/javascript">
	// Validation Edit Folder
	<?php if($errors->has('nama_folder2')): ?>
		$("#modal-edit-folder").modal("show");
	<?php endif; ?>

    // Button Edit Folder
    $(document).on("click", ".btn-edit-folder", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var name = $("#table-produk tr.data-folder").find(".td-name[data-id="+id+"]").data("value");
        $("#modal-edit-folder").find("input[name=id_folder]").val(id);
        $("#modal-edit-folder").find("input[name=nama_folder2]").val(name);
    });
	
    // Button Submit Edit Folder
    $(document).on("click", "#btn-submit-edit-folder", function(e){
        $("#form-edit-folder").submit();
    });

    // Close Modal Edit Folder
    $('#modal-edit-folder').on('hidden.bs.modal', function(e){
        $("#modal-edit-folder").find("input[type=text]").val(null);
    });
</script>

<script type="text/javascript">
	// Validation Edit File
	<?php if($errors->has('nama_produk')): ?>
		$("#modal-edit-file").modal("show");
	<?php endif; ?>
	
    // Button Edit File
    $(document).on("click", ".btn-edit-file", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var name = $("#table-produk tr.data-file").find(".td-name[data-id="+id+"]").data("value");
        $("#modal-edit-file").find("input[name=id_produk]").val(id);
        $("#modal-edit-file").find("input[name=nama_produk]").val(name);
    });

    // Button Submit Edit File
    $(document).on("click", "#btn-submit-edit-file", function(e){
        $("#form-edit-file").submit();
    });

    // Close Modal Edit File
    $('#modal-edit-file').on('hidden.bs.modal', function(e){
        $("#modal-edit-file").find("input[type=text]").val(null);
    });
</script>

<script type="text/javascript">
    // Button Show Modal Move Folder / File
    $(document).on("click", ".btn-move", function(e){
		var id = $(this).data("id");
		var type = $(this).data("type");
		$("#id-product").val(id);
		$("#move-type").val(type);
        $("#modal-move").modal("show");
    });
	
	// Button Click Available Folder
    $(document).on("click", ".btn-available-folder", function(e){
        e.preventDefault();
        var id = $(this).data("id");
		$(this).addClass("bg-warning");
		$("#destination").val(id);
		$(".btn-available-folder").each(function(key,elem){
			var elemId = $(elem).data("id");
			if(elemId != id) $(elem).removeClass("bg-warning");
		});
		$("#btn-submit-move").removeAttr("disabled");
    });

    // Button Submit Move
    $(document).on("click", "#btn-submit-move", function(e){
        $("#form-move").submit();
    });

    // Close Modal Move
    $('#modal-move').on('hidden.bs.modal', function(e){
        $("#modal-move").find("input[type=hidden]").val(null);
		$(".btn-available-folder").each(function(key,elem){
			$(elem).removeClass("bg-warning");
		});
    });
</script>

<script type="text/javascript">
    // Button Delete Folder
    $(document).on("click", ".btn-delete-folder", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var ask = confirm("Anda yakin ingin menghapus folder ini beserta isinya?");
        if(ask){
            $("#id-folder").val(id);
            $("#form-delete-folder").submit();
        }
    });

    // Button Delete File
    $(document).on("click", ".btn-delete-file", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var ask = confirm("Anda yakin ingin menghapus file ini?");
        if(ask){
            $("#id-file").val(id);
            $("#form-delete-file").submit();
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" rel="stylesheet">
<style type="text/css">
	#table-available-folders tr td {padding: .5rem;}
	#table-available-folders tr td:hover {background-color: #eee; cursor: pointer;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/e-competence/admin/index.blade.php ENDPATH**/ ?>