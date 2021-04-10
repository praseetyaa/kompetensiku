

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
                <h4 class="page-title">Materi E-Competence</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/member">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Materi E-Competence</li>
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
                                <h5 class="mb-0">Materi E-Competence</h5>
                            </div>
                            <div class="col-12 col-sm-auto text-center text-sm-left">
								<form id="form-search" class="<?php echo e($directory->id_folder != 1 ? 'd-none' : ''); ?>" method="post" action="#">
									<?php echo e(csrf_field()); ?>

									<input type="hidden" name="jenis_folder" value="3">
									<input type="hidden" name="jenis_file" value="3">
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
								<strong>Folder:</strong><br><a href="/member/e-competence?dir=/">Home</a> &raquo; <?php echo e($directory->nama_folder); ?>

							<?php endif; ?>
						</div>
						<div class="col-12">
							<div class="row" id="data-folder">
								<?php $__currentLoopData = $folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<a class="col-md-6 col-lg-4 col-xlg-4" href="/member/e-competence?dir=<?php echo e($folder->dir_folder); ?>">
									<div class="card card-hover shadow">
										<div class="box text-center">
											<h1 class="font-light text-primary"><i class="mdi mdi-folder"></i></h1>
											<h6 class="text-dark"><?php echo e($folder->nama_folder); ?></h6>
											<p class="mb-0 text-secondary">(<?php echo e(count_files($folder->id_folder, $folder->jenis_folder)); ?> file)</p>
										</div>
									</div>
								</a>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							<div class="row" id="data-file">
								<?php if(count($folders)>0 || count($files)>0): ?>
									<?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<a class="col-md-6 col-lg-4 col-xlg-4" href="/member/e-competence/view/<?php echo e($file->id_file); ?>">
										<div class="card card-hover shadow">
											<div class="box text-center">
												<h1 class="font-light text-primary"><i class="mdi mdi-file-pdf"></i></h1>
												<h6 class="text-dark"><?php echo e($file->nama_file); ?></h6>
												<p class="mb-0 text-secondary">(<?php echo e(count_pages($file->url)); ?> halaman)</p>
											</div>
										</div>
									</a>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php else: ?>
								<div class="col-12">
									<div class="alert alert-danger text-center">Materi E-Competence belum tersedia.</div>
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
				url: "/member/e-competence/search",
				data: {_token: "<?php echo e(csrf_token()); ?>", search: search, jenis_folder: jenis_folder, jenis_file: jenis_file},
				success: function(response){
					var result = JSON.parse(response);
					var html = '';
					var html2 = '';
					var html3 = '';
					html3 += '<div class="col-12">';
					html3 += '<div class="alert alert-danger text-center">Materi E-Competence belum tersedia.</div>';
					html3 += '</div>';
					$(result.folders).each(function(key,data){
						html += '<a class="col-md-6 col-lg-4 col-xlg-4" href="/member/e-competence?dir='+data.dir_folder+'">';
						html += '<div class="card card-hover shadow">';
						html += '<div class="box text-center">';
						html += '<h1 class="font-light text-primary"><i class="mdi mdi-folder"></i></h1>';
						html += '<h6 class="text-dark">'+data.nama_folder+'</h6>';
						html += '</div>';
						html += '</div>';
						html += '</a>';
					});
					$(result.files).each(function(key,data){
						html2 += '<a class="col-md-6 col-lg-4 col-xlg-4" href="/member/e-competence/view/'+data.id_file+'" target="_blank">';
						html2 += '<div class="card card-hover shadow">';
						html2 += '<div class="box text-center">';
						html2 += '<h1 class="font-light text-primary"><i class="mdi mdi-file-pdf"></i></h1>';
						html2 += '<h6 class="text-dark">'+data.nama_file+'</h6>';
						html2 += '</div>';
						html2 += '</div>';
						html2 += '</a>';
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
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
    .border-top, .border-bottom {padding: 1.25rem;}
    .form-control {border-color: #caccce;}
    .input-group-text {border-color: #caccce;}
	.box {background-color: #fdd100!important; cursor: pointer;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/member/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/psikologanda.com/laravel-akademi/resources/views/e-competence/member/index.blade.php ENDPATH**/ ?>