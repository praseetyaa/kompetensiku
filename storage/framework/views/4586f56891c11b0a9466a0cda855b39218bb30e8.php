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
                <h4 class="page-title">Detail Pesan</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/email">E-Mail</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Pesan</li>
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
                    <h5 class="card-title border-bottom">Detail Pesan</h5>
                    <div class="card-body">
                        <?php if(Session::get('message') != null): ?>
                            <div class="alert alert-success alert-dismissible mb-4 fade show" role="alert">
                                <?php echo e(Session::get('message')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <form id="form" method="post" action="#" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Subjek <span class="text-danger">*</span></label>
                                    <input type="text" name="subjek" class="form-control <?php echo e($errors->has('subjek') ? 'is-invalid' : ''); ?>" value="<?php echo e($email->subject); ?>" placeholder="Masukkan Subjek" readonly>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Penerima <span class="text-danger">*</span></label>
									<br>
									<button type="button" id="btn-search" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModalCenter">Lihat Penerima</button>
                                    <input type="hidden" name="ids" id="id-penerima" class="form-control" value="<?php echo e($email->receiver_id); ?>">
                                    <textarea id="email-penerima" name="emails" class="form-control" rows="2" readonly><?php echo e($email->receiver_email); ?></textarea>
                                    <?php
                                    	$emails = explode(', ', $email->receiver_email);
                                   	?>
								</div>
                                <div class="form-group col-md-12">
                                    <label>Konten <span class="text-danger">*</span></label>
                                    <textarea name="konten" id="konten" class="d-none" readonly></textarea>
                                    <div id="editor" disabled><?php echo html_entity_decode($email->content); ?></div> 
                                </div>
                            </div>
                        </form>
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

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Pilih Penerima</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table mb-0" id="table-receivers">
					<?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr class="tr-checkbox" data-id="<?php echo e($member->id_user); ?>" data-email="<?php echo e($member->email); ?>">
						<td>
							<input name="receivers[]" class="input-receivers d-none" type="checkbox" data-id="<?php echo e($member->id_user); ?>" data-email="<?php echo e($member->email); ?>" value="<?php echo e($member->id_user); ?>">
							<span class="text-primary"><?php echo e($member->email); ?></span><br><span class="text-success"><?php echo e($member->nama_user); ?></span>
						</td>
						<td width="30" align="center" class="td-check align-middle">
							<i class="fa fa-check text-primary <?php echo e(in_array($member->email, $emails) ? '' : 'd-none'); ?>"></i>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>
			</div>
			<div class="modal-footer">
				<input type="hidden" id="temp-id">
				<span><strong id="count-checked"><?php echo e(count($emails)); ?></strong> email terpilih.</span>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<!--<button type="button" class="btn btn-primary" id="btn-choose">Pilih</button>-->
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script type="text/javascript">		
    // Quill Editor
    var toolbarOptions = [
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        ['bold', 'italic', 'underline', 'strike', 'link'],
        [{ 'script': 'sub'}, { 'script': 'super' }],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'color': [] }, { 'background': [] }],
        ['clean']     
    ];

    var quill = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions
        },
        placeholder: 'Tulis sesuatu...',
		readOnly: true,
        theme: 'snow',
        imageResize: {
            displayStyles: {
                backgroundColor: 'black',
                border: 'none',
                color: 'white'
            },
            modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
        }
    });

    // Button Submit
    $(document).on("click", "#btn-submit", function(e){
        var myEditor = document.querySelector('#editor');
        var html = myEditor.children[0].innerHTML;
        $("#konten").text(html);
        $("#form").submit();
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style type="text/css">
    #editor {height: 300px;}
	.modal-content {max-height: 500px; overflow-y: hidden;}
	.modal-body {overflow-y: auto;}
	#table-receivers tr td {padding: .5rem!important;}
	#table-receivers tr td:hover {background-color: #eeeeee!important;}
	.tr-checkbox {cursor: pointer;}
	.ql-editor h1, .ql-editor h2, .ql-editor h3, .ql-editor h4, .ql-editor h5, .ql-editor h6, .ql-editor p {margin-bottom: 1rem!important;}
	.ql-editor ol li, .ql-editor ul li {margin-bottom: 0!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/public_html/laravel-v3/resources/views/mail/admin/detail.blade.php ENDPATH**/ ?>