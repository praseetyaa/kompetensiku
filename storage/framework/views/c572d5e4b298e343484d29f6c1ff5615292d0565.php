

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
                            <li class="breadcrumb-item"><a href="/member">Home</a></li>
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
                            <div class="col-12 col-sm-auto text-center text-sm-left">
								<form id="form-search" class="<?php echo e($directory->id_folder != 1 ? 'd-none' : ''); ?>" method="post" action="#">
									<?php echo e(csrf_field()); ?>

									<input type="hidden" name="jenis_folder" value="<?php echo e($kategori->id_km); ?>">
									<input type="hidden" name="jenis_file" value="<?php echo e($kategori->id_km); ?>">
									<input type="text" name="search" id="search" class="form-control form-control-sm" placeholder="Cari disini...">
								</form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
						<div class="col-12 mb-4">
							<?php if($directory->folder_parent == 0): ?>
								<strong>Folder:</strong> Home
							<?php elseif($directory->folder_parent == 1): ?>
								<strong>Folder:</strong><br><a href="/member/materi/<?php echo e(generate_permalink($kategori->kategori)); ?>?dir=/">Home</a> &raquo; <?php echo e($directory->nama_folder); ?>

							<?php endif; ?>
						</div>
						<div class="col-12">
							<div class="row" id="data-folder">
								<?php $__currentLoopData = $folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<a class="col-md-6 col-lg-3 col-xlg-3" href="/member/materi/<?php echo e(generate_permalink($kategori->kategori)); ?>?dir=<?php echo e($folder->dir_folder); ?>">
									<div class="card card-hover shadow">
										<div class="box text-center">
											<?php if(date('Y-m-d') == date('Y-m-d', strtotime($folder->modified_at))): ?><div class="badge-new text-success">Baru!</div><?php endif; ?>
											<img src="<?php echo e($folder->folder_icon != '' ? asset('assets/images/icon/'.$folder->folder_icon) : asset('assets/images/default/folder.png')); ?>" height="100">
											<h6 class="text-dark mt-2"><?php echo e($folder->nama_folder); ?></h6>
											<p class="mb-0 text-secondary">(<?php echo e(count_files($folder->id_folder, $folder->jenis_folder)); ?> file)</p>
										</div>
									</div>
								</a>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							<div class="row" id="data-file">
								<?php if(count($folders)>0 || count($files)>0): ?>
									<?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover shadow">
											<?php if(date('Y-m-d') == date('Y-m-d', strtotime($file->uploaded_at))): ?><div class="badge-new text-success">Baru!</div><?php endif; ?>
                                            <a href="/member/materi/<?php echo e(generate_permalink($kategori->kategori)); ?>/view/<?php echo e($file->id_file); ?>">
                                                <img class="card-img-top" src="<?php echo e($file->thumbnail_file != '' ? asset('assets/images/file-thumbnail/'.$file->thumbnail_file) : asset('assets/images/default/file.jpg')); ?>" alt="Gambar">
                                            </a>
                                            <div class="card-body text-center">
												<h6 class="text-dark mt-2"><?php echo e($file->nama_file); ?></h6>
												<p class="mb-0 text-secondary">(<?php echo e(count_pages($file->url)); ?> halaman)</p>
                                            </div>
                                        </div>
                                    </div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php else: ?>
								<div class="col-12">
									<div class="alert alert-danger text-center">Materi <?php echo e($kategori->kategori); ?> belum tersedia.</div>
								</div>
								<?php endif; ?>
							</div>
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
    <?php echo $__env->make('template/member/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script type="text/javascript">
	
	// Search
	$(document).on("keyup", "#search", function(){
		var search = $.trim($(this).val());
		var jenis_folder = $("input[name=jenis_folder]").val();
		var jenis_file = $("input[name=jenis_file]").val();
		//if(search != ''){
			$.ajax({
				type: "post",
				url: "/member/materi/<?php echo e(generate_permalink($kategori->kategori)); ?>/search",
				data: {_token: "<?php echo e(csrf_token()); ?>", search: search, jenis_folder: jenis_folder, jenis_file: jenis_file},
				success: function(response){
					var result = JSON.parse(response);
					var html = '';
					var html2 = '';
					var html3 = '';
					html3 += '<div class="col-12">';
					html3 += '<div class="alert alert-danger text-center">Pencarian tidak ditemukan.</div>';
					html3 += '</div>';
					$(result.folders).each(function(key,data){
						html += '<a class="col-md-6 col-lg-3 col-xlg-3" href="/member/materi/<?php echo e(generate_permalink($kategori->kategori)); ?>?dir='+data.dir_folder+'">';
						html += '<div class="card card-hover shadow">';
						html += '<div class="box text-center">';
						html += generate_yyyymmdd(new Date()) == generate_yyyymmdd(new Date(data.modified_at)) ? '<div class="badge-new text-success">Baru!</div>' : '';
						html += data.folder_icon != '' ? '<img src="<?php echo e(asset('assets/images/icon')); ?>/'+data.folder_icon+'" height="100">' : '<img src="<?php echo e(asset('assets/images/default/folder.png')); ?>" height="100">' ;
						html += '<h6 class="text-dark mt-2">'+data.nama_folder+'</h6>';
						html += '<p class="mb-0 text-secondary">('+data.count+' file)</p>';
						html += '</div>';
						html += '</div>';
						html += '</a>';
					});
					$(result.files).each(function(key,data){
                        html2 += '<div class="col-md-6 col-lg-3 col-xlg-3">';
                        html2 += '<div class="card card-hover shadow">';
						html2 += generate_yyyymmdd(new Date()) == generate_yyyymmdd(new Date(data.uploaded_at)) ? '<div class="badge-new text-success">Baru!</div>' : '';
                        html2 += '<a href="/member/materi/<?php echo e(generate_permalink($kategori->kategori)); ?>/view/'+data.id_file+'">';
                        html2 += data.thumbnail_file != '' ? '<img class="card-img-top" src="<?php echo e(asset('assets/images/file-thumbnail')); ?>/'+data.thumbnail_file+'">' : '<img class="card-img-top" src="<?php echo e(asset('assets/images/default/file.jpg')); ?>">';
                        html2 += '</a>';
                        html2 += '<div class="card-body text-center">';
						html2 += '<h6 class="text-dark mt-2">'+data.nama_file+'</h6>';
						html2 += '<p class="mb-0 text-secondary">('+data.count+' halaman)</p>';
                        html2 += '</div>';
                        html2 += '</div>';
						html2 += '</div>';
					});
					if(result.folders.length > 0 || result.files.length > 0){
						$("#data-folder").html(html);
						$("#data-file").html(html2);
					}
					else{
						$("#data-folder").html('');
						$("#data-file").html(html3);
					}
				}
			});
		//}
	});

	// Generate date ke format yyyy-mm-dd
	function generate_yyyymmdd(date){
		return date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
	} 
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
	.box {background-color: #fff!important; cursor: pointer;}
	.badge-new {font-weight: 800; position: absolute; right: 15px;}
	#data-file .card-body {padding: .5rem!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/member/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/bisa.co.id/public_html/bisa-v2/resources/views/materi/member/index.blade.php ENDPATH**/ ?>