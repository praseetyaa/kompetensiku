

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
                <h4 class="page-title">Materi <?php echo e($kategori->kategori); ?></h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Materi <?php echo e($kategori->kategori); ?></li>
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
                                <h5 class="mb-0">Materi <?php echo e($kategori->kategori); ?></h5>
                            </div>
                            <?php if(Auth::user()->role == role_it() || Auth::user()->role == role_manajer() || Auth::user()->role == role_mentor()): ?>
                            <div class="col-12 col-sm-auto text-center text-sm-left">
								<?php if($directory->folder_parent == 0): ?>
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add-folder"><i class="fa fa-folder mr-2"></i> Tambah Folder</a>
								<?php endif; ?>
                                <a href="/admin/materi/<?php echo e(generate_permalink($kategori->kategori)); ?>/upload?dir=<?php echo e($directory->dir_folder); ?>" class="btn btn-sm btn-primary"><i class="fa fa-upload mr-2"></i> Tambah File</a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body">
						<div class="col-12 mb-4">
							<?php if($directory->folder_parent == 0): ?>
								<strong>Folder:</strong> Home
							<?php elseif($directory->folder_parent == 1): ?>
								<strong>Folder:</strong> <a href="/admin/materi/<?php echo e(generate_permalink($kategori->kategori)); ?>?dir=/">Home</a> / <?php echo e($directory->nama_folder); ?>

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
										<th width="100">Icon</th>
										<th>Nama</th>
										<th width="100">Tanggal Diubah</th>
                                        <?php if(Auth::user()->role == role_it() || Auth::user()->role == role_manajer() || Auth::user()->role == role_mentor()): ?>
                                        <th width="40">Opsi</th>
                                        <?php endif; ?>
									</tr>
								</thead>
								<tbody>
                                    <!-- Data Folder -->
									<?php $__currentLoopData = $folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="data-folder" data-id="<?php echo e($folder->id_folder); ?>">
										<td><img class="img-fluid" src="<?php echo e($folder->folder_icon != '' ? asset('assets/images/icon/'.$folder->folder_icon) : asset('assets/images/default/folder.png')); ?>"></td>
										<td class="td-name" data-id="<?php echo e($folder->id_folder); ?>" data-value="<?php echo e($folder->nama_folder); ?>">
											<a href="/admin/materi/<?php echo e(generate_permalink($kategori->kategori)); ?>?dir=<?php echo e($folder->dir_folder); ?>">
												<?php echo e($folder->nama_folder); ?>

											</a> (<?php echo e(count_files($folder->id_folder, $folder->jenis_folder)); ?> file)
										</td>
                                        <td>
											<span title="<?php echo e(date('Y-m-d H:i:s', strtotime($folder->modified_at))); ?>" style="text-decoration: underline; cursor: help;">
												<?php echo e(date('Y-m-d', strtotime($folder->modified_at))); ?>

											</span>
										</td>
                                        <?php if(Auth::user()->role == role_it() || Auth::user()->role == role_manajer() || Auth::user()->role == role_mentor()): ?>
										<td>
											<button type="button" class="btn btn-warning btn-sm btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opsi</button>
											<div class="dropdown-menu dropdown-menu-right shadow">
											  <a class="dropdown-item btn-edit-folder" href="#" data-id="<?php echo e($folder->id_folder); ?>" data-toggle="modal" data-target="#modal-edit-folder">Ubah Nama</a>
											  <a class="dropdown-item btn-edit-icon" href="#" data-id="<?php echo e($folder->id_folder); ?>" data-toggle="modal" data-target="#modal-edit-icon">Ubah Icon</a>
											  <a class="dropdown-item btn-delete-folder" href="#" data-id="<?php echo e($folder->id_folder); ?>">Hapus</a>
											</div>
										</td>
                                        <?php endif; ?>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- /Data Folder -->
                                    
                                    <!-- Data File -->
									<?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="data-file" data-id="<?php echo e($file->id_file); ?>">
										<td><img class="img-fluid" src="<?php echo e($file->thumbnail_file != '' ? asset('assets/images/file-thumbnail/'.$file->thumbnail_file) : asset('assets/images/default/file.jpg')); ?>"></td>
										<td class="td-name" data-id="<?php echo e($file->id_file); ?>" data-value="<?php echo e($file->nama_file); ?>">
											<a href="/admin/materi/<?php echo e(generate_permalink($kategori->kategori)); ?>/view/<?php echo e($file->id_file); ?>">
												<?php echo e($file->nama_file); ?>

											</a> (<?php echo e(count_pages($file->url)); ?> halaman)
										</td>
                                        <td>
											<span title="<?php echo e(date('Y-m-d H:i:s', strtotime($file->uploaded_at))); ?>" style="text-decoration: underline; cursor: help;">
												<?php echo e(date('Y-m-d', strtotime($file->uploaded_at))); ?>

											</span>
										</td>
                                        <?php if(Auth::user()->role == role_it() || Auth::user()->role == role_manajer() || Auth::user()->role == role_mentor()): ?>
										<td>
											<button type="button" class="btn btn-warning btn-sm btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opsi</button>
											<div class="dropdown-menu dropdown-menu-right shadow">
											  <a class="dropdown-item btn-move" href="#" data-id="<?php echo e($file->id_file); ?>" data-type="file" data-toggle="modal" data-target="#modal-move">Pindah</a>
											  <a class="dropdown-item btn-edit-file" href="#" data-id="<?php echo e($file->id_file); ?>" data-toggle="modal" data-target="#modal-edit-file">Ubah Nama</a>
											  <a class="dropdown-item btn-edit-thumbnail" href="#" data-id="<?php echo e($file->id_file); ?>" data-toggle="modal" data-target="#modal-edit-thumbnail">Ubah Thumbnail</a>
											  <a class="dropdown-item btn-delete-file" href="#" data-id="<?php echo e($file->id_file); ?>">Hapus</a>
											</div>
										</td>
                                        <?php endif; ?>
									</tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- /Data File -->
								</tbody>
							</table>
                            <form id="form-delete-folder" class="d-none" method="post" action="/admin/folder/delete">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id" id="id-folder">
                            </form>
                            <form id="form-delete-file" class="d-none" method="post" action="/admin/materi/<?php echo e(generate_permalink($kategori->kategori)); ?>/delete">
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

					<input type="hidden" name="jenis_folder" value="<?php echo e(generate_permalink($kategori->id_km)); ?>">
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Nama Folder</h5>
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

<!-- Modal Edit Icon -->
<div class="modal fade" id="modal-edit-icon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Icon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab-upload" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Upload</span></a> </li>
					<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab-list-icon" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">List Icon</span></a> </li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content tabcontent-border">
					<div class="tab-pane active" id="tab-upload" role="tabpanel">
						<div class="p-20">
							<input type="file" class="d-none" id="file-icon">
                        	<input type="hidden" name="id_folder">
							<button type="button" class="btn btn-md btn-primary" id="btn-upload-icon">Upload Icon</button>
							<br>
							<div class="text-muted mt-1">Resolusi yang direkomendasikan 1:1</div>
						</div>
					</div>
					<div class="tab-pane p-20" id="tab-list-icon" role="tabpanel">
						<div class="p-20">
                            <?php if(count($folder_icon)>0): ?>
							    <p class="text-center">Klik untuk memilih icon.</p>
                            <?php else: ?>
                                <div class="alert alert-danger text-center">Belum ada icon tersedia.</div>
                            <?php endif; ?>
							<div class="row">
								<?php if(count($folder_icon)>0): ?>
									<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3 text-center">
										<a href="#" class="btn-choose-icon" data-id="">
											<img src="<?php echo e(asset('assets/images/default/folder.png')); ?>" class="img-fluid img-thumbnail">
										</a>
									</div>
									<?php $__currentLoopData = $folder_icon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3 text-center">
										<a href="#" class="btn-choose-icon" data-id="<?php echo e($icon->id_fi); ?>">
											<img src="<?php echo e(asset('assets/images/icon/'.$icon->folder_icon)); ?>" class="img-fluid img-thumbnail">
										</a>
									</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</div>
                            <?php if(count($folder_icon)>0): ?>
                                <form method="post" class="mt-3" action="/admin/folder/choose-icon">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="id_fi">
                                    <input type="hidden" name="id_folder_2">
                                    <button type="submit" class="btn btn-success" id="btn-choose-icon" disabled>Pilih Icon</button>
                                </form>
                            <?php endif; ?>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit Icon -->

<!-- Modal Croppie Icon -->
<div class="modal fade" id="modal-croppie-icon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crop Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="table-responsive">
                	<div id="demo-icon" class="mt-3"></div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-crop-icon">Crop and Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
            <form id="form-update-icon" class="d-none" method="post" action="/admin/folder/upload-icon">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="src_image">
                <input type="hidden" name="id_folder">
            </form>
        </div>
    </div>
</div>
<!-- End Modal Croppie Icon -->

<!-- Modal Edit File -->
<div class="modal fade" id="modal-edit-file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-file" method="post" action="/admin/materi/<?php echo e(generate_permalink($kategori->kategori)); ?>/update">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Nama File <span class="text-danger">*</span></label>
                            <input type="text" name="nama_file" class="form-control <?php echo e($errors->has('nama_file') ? 'is-invalid' : ''); ?>" placeholder="Masukkan Nama File" value="<?php echo e(old('nama_file')); ?>">
                            <?php if($errors->has('nama_file')): ?>
                            <small class="text-danger"><?php echo e(ucfirst($errors->first('nama_file'))); ?></small>
                            <?php endif; ?>
                        </div>
                        <input type="hidden" name="id_file">
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

<!-- Modal Edit Thumbnail -->
<div class="modal fade" id="modal-edit-thumbnail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Thumbnail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab-upload-thumbnail" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Upload</span></a> </li>
					<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab-list-thumbnail" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">List Thumbnail</span></a> </li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content tabcontent-border">
					<div class="tab-pane active" id="tab-upload-thumbnail" role="tabpanel">
						<div class="p-20">
							<input type="file" class="d-none" id="file-thumbnail">
                        	<input type="hidden" name="id_file">
							<button type="button" class="btn btn-md btn-primary" id="btn-upload-thumbnail">Upload Thumbnail</button>
							<br>
							<div class="text-muted mt-1">Resolusi yang direkomendasikan 16:9</div>
						</div>
					</div>
					<div class="tab-pane p-20" id="tab-list-thumbnail" role="tabpanel">
						<div class="p-20">
                            <?php if(count($file_thumbnail)>0): ?>
							    <p class="text-center">Klik untuk memilih thumbnail.</p>
                            <?php else: ?>
                                <div class="alert alert-danger text-center">Belum ada thumbnail tersedia.</div>
                            <?php endif; ?>
							<div class="row">
								<?php if(count($file_thumbnail)>0): ?>
									<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3 text-center">
										<a href="#" class="btn-choose-thumbnail" data-id="">
											<img src="<?php echo e(asset('assets/images/default/file.jpg')); ?>" class="img-fluid img-thumbnail">
										</a>
									</div>
									<?php $__currentLoopData = $file_thumbnail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thumbnail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3 text-center">
										<a href="#" class="btn-choose-thumbnail" data-id="<?php echo e($thumbnail->id_ft); ?>">
											<img src="<?php echo e(asset('assets/images/file-thumbnail/'.$thumbnail->file_thumbnail)); ?>" class="img-fluid img-thumbnail">
										</a>
									</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</div>
                            <?php if(count($folder_icon)>0): ?>
                                <form method="post" class="mt-3" action="/admin/file/choose-thumbnail">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="id_ft">
                                    <input type="hidden" name="id_file_2">
                                    <button type="submit" class="btn btn-success" id="btn-choose-thumbnail" disabled>Pilih Thumbnail</button>
                                </form>
                            <?php endif; ?>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit Thumbnail -->

<!-- Modal Croppie Thumbnail -->
<div class="modal fade" id="modal-croppie-thumbnail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crop Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="table-responsive">
                	<div id="demo-thumbnail" class="mt-3"></div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-crop-thumbnail">Crop and Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
            <form id="form-update-thumbnail" class="d-none" method="post" action="/admin/file/upload-thumbnail">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="src_image">
                <input type="hidden" name="id_file">
            </form>
        </div>
    </div>
</div>
<!-- End Modal Croppie Icon -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script type="text/javascript" src="<?php echo e(asset('assets/plugins/croppie/croppie.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/matrix-admin/assets/extra-libs/DataTables/datatables.min.js')); ?>"></script>
<script type="text/javascript">
    // DataTable
    $('#table-produk').DataTable({
        "order": [[ 2, "desc" ]]
    });
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
    // Button Edit Thumbnail
    $(document).on("click", ".btn-edit-thumbnail", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        $("#modal-edit-thumbnail").find("input[name=id_file]").val(id);
        $("#modal-edit-thumbnail").find("input[name=id_file_2]").val(id);
    });

    /* Croppie */
    var demoThumbnail = $('#demo-thumbnail').croppie({
        viewport: {width: 640, height: 360},
        boundary: {width: 640, height: 360}
    });
    var imageURL;

    // Upload Thumbnail
    $(document).on("click", "#btn-upload-thumbnail", function(e){
        e.preventDefault();
        $("#file-thumbnail").trigger("click");
    });

    $(document).on("change", "#file-thumbnail", function(){
        readURL(this);
        $("#modal-croppie-thumbnail").modal("show");
        $("#modal-edit-thumbnail").modal("hide");
    });

    $('#modal-croppie-thumbnail').on('shown.bs.modal', function(){
        demoThumbnail.croppie('bind', {
            url: imageURL
        }).then(function(){
            console.log('jQuery bind complete');
        });
    });

    $(document).on("click", "#btn-crop-thumbnail", function(e){
        demoThumbnail.croppie("result", {
            type: "base64",
            format: "jpeg",
            size: {width: 848, height: 480}
        }).then(function(response){
            $("#modal-croppie-thumbnail input[name=src_image]").val(response);
            $("#modal-croppie-thumbnail").find("input[name=id_file]").val($("#modal-edit-thumbnail").find("input[name=id_file]").val());
            $("#form-update-thumbnail").submit();
        });
        $("#file-thumbnail").val(null);
    });

    $('#modal-croppie-thumbnail').on('hidden.bs.modal', function(e){
        e.preventDefault();
        $("#file-thumbnail").val(null);
    });
    /* End Croppie */

	// Pilih Thumbnail
    $(document).on("click", ".btn-choose-thumbnail", function(e){
        e.preventDefault();
		var id = $(this).data("id");
		$(this).find("img").addClass("border-primary");
		$(".btn-choose-thumbnail").each(function(key,elem){
			var elemId = $(elem).data("id");
			if(elemId != id) $(elem).find("img").removeClass("border-primary");
		});
		$("input[name=id_ft]").val(id);
		$("#btn-choose-thumbnail").removeAttr("disabled");
    });
</script>
	
<script type="text/javascript">
    // Button Edit Icon
    $(document).on("click", ".btn-edit-icon", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        $("#modal-edit-icon").find("input[name=id_folder]").val(id);
        $("#modal-edit-icon").find("input[name=id_folder_2]").val(id);
    });

    /* Croppie */
    var demoIcon = $('#demo-icon').croppie({
        viewport: {width: 600, height: 600},
        boundary: {width: 600, height: 600}
    });
    var imageURL;

	// Upload Icon
    $(document).on("click", "#btn-upload-icon", function(e){
        e.preventDefault();
        $("#file-icon").trigger("click");
    });

    $(document).on("change", "#file-icon", function(){
        readURL(this);
        $("#modal-croppie-icon").modal("show");
        $("#modal-edit-icon").modal("hide");
    });

    $('#modal-croppie-icon').on('shown.bs.modal', function(){
        demoIcon.croppie('bind', {
            url: imageURL
        }).then(function(){
            console.log('jQuery bind complete');
        });
    });

    $(document).on("click", "#btn-crop-icon", function(e){
        demoIcon.croppie("result", {
            type: "base64",
            format: "png",
            size: {width: 800, height: 800}
        }).then(function(response){
            $("#modal-croppie-icon input[name=src_image]").val(response);
        	$("#modal-croppie-icon").find("input[name=id_folder]").val($("#modal-edit-icon").find("input[name=id_folder]").val());
            $("#form-update-icon").submit();
        });
        $("#file-icon").val(null);
    });

	$('#modal-croppie-icon').on('hidden.bs.modal', function(e){
        e.preventDefault();
        $("#file-icon").val(null);
	});

    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                imageURL = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    /* End Croppie */

	// Pilih Icon
    $(document).on("click", ".btn-choose-icon", function(e){
        e.preventDefault();
		var id = $(this).data("id");
		$(this).find("img").addClass("border-primary");
		$(".btn-choose-icon").each(function(key,elem){
			var elemId = $(elem).data("id");
			if(elemId != id) $(elem).find("img").removeClass("border-primary");
		});
		$("input[name=id_fi]").val(id);
		$("#btn-choose-icon").removeAttr("disabled");
    });
</script>

<script type="text/javascript">
	// Validation Edit File
	<?php if($errors->has('nama_file')): ?>
		$("#modal-edit-file").modal("show");
	<?php endif; ?>
	
    // Button Edit File
    $(document).on("click", ".btn-edit-file", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var name = $("#table-produk tr.data-file").find(".td-name[data-id="+id+"]").data("value");
        $("#modal-edit-file").find("input[name=id_file]").val(id);
        $("#modal-edit-file").find("input[name=nama_file]").val(name);
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

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/plugins/croppie/croppie.css')); ?>">
<link href="<?php echo e(asset('templates/matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" rel="stylesheet">
<style type="text/css">
	#table-available-folders tr td {padding: .5rem;}
	#table-available-folders tr td:hover {background-color: #eee; cursor: pointer;}
	.btn-choose-icon img, .btn-choose-thumbnail img {border-width: 5px; padding: 0px!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/laravel-v3/resources/views/materi/admin/index.blade.php ENDPATH**/ ?>