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
                <h4 class="page-title"><?php echo e($rak->rak); ?></h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/member">Home</a></li>
                            <li class="breadcrumb-item"><a href="/member/script">Kumpulan Copywriting</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($rak->rak); ?></li>
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
                <!-- accordion -->
                <div class="accordion shadow" id="accordionExample">
                    <?php $__currentLoopData = $script; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card m-b-0 border-top">
                        <div class="card-header" id="heading-<?php echo e($key); ?>">
                            <h5 class="mb-0">
                                <a  data-toggle="collapse" data-target="#collapse-<?php echo e($key); ?>" aria-expanded="true" aria-controls="collapse-<?php echo e($key); ?>">
                                    <i class="m-r-5 fa fa-clipboard" aria-hidden="true"></i>
                                    <span><?php echo e($data->script_title); ?></span>
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-<?php echo e($key); ?>" class="collapse <?php echo e($key == 0 ? 'show' : ''); ?>" aria-labelledby="collapse-<?php echo e($key); ?>" data-parent="#accordionExample">
                            <div class="card-footer">
                                <button class="btn btn-success btn-sm btn-copy" data-id="<?php echo e($key); ?>" type="button" data-toggle="tooltip" data-placement="top" title="Salin Teks"><i class="fa fa-copy mr-2"></i>Salin Teks</button>
                            </div>
                            <div class="card-body"><?php echo nl2br(html_entity_decode($data->script)); ?></div>
                            <textarea id="textarea-<?php echo e($key); ?>"><?php echo nl2br(html_entity_decode($data->script)); ?></textarea>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- accordion -->
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
	// Button Copy to Clipboard
    $(document).on("click", ".btn-copy", function(e){
		e.preventDefault();
        var id = $(this).data("id");
		// var copyText = document.getElementById("textarea");
		var copyText = document.getElementById("textarea-"+id);
		copyText.select();
		copyText.setSelectionRange(0, 999999);
		console.log(document.execCommand("copy"));
		$(this).attr('data-original-title','Berhasil Menyalin Teks!');
		$(this).tooltip("show");
		$(this).attr('data-original-title','Salin Teks');
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
    .accordion .card-header {cursor: pointer;}
    .accordion .border-top {padding: 0;}
    textarea {position: absolute; z-index: -10;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/member/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms-v2\resources\views/script/member/scripts2.blade.php ENDPATH**/ ?>