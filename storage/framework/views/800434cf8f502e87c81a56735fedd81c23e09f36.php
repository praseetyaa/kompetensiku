

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
                <h4 class="page-title">Lihat Video</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/e-course">Materi E-Course</a></li>
                            <li class="breadcrumb-item"><a href="/admin/e-course">Chapter</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Lihat Video</li>
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="embed-responsive embed-responsive-16by9 mb-3">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo e($course->course_youtube); ?>?rel=0&modestbranding=1" allowfullscreen></iframe>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <a href="<?php echo e($prev != null ? '/admin/e-course/detail/'.$prev->id_course : 'Javascript:alert("Video ini paling awal");'); ?>" class="btn btn-primary btn-block"><i class="fa fa-chevron-left mr-2"></i>Sebelumnya</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="<?php echo e($next != null ? '/admin/e-course/detail/'.$next->id_course : 'Javascript:alert("Video ini paling akhir");'); ?>" class="btn btn-primary btn-block">Selanjutnya<i class="fa fa-chevron-right ml-2"></i></a>
                                    </div>
                                </div>
                                <p class="h4 mb-3 text-secondary"><i class="fa fa-tag mr-2"></i> Chapter <?php echo e($course->chapter_nomor); ?> : <?php echo e($course->chapter_judul); ?></p>
                                <p class="h3"><?php echo e($course->course_judul); ?></p>
                                <p><?php echo e($course->course_caption); ?></p>
                            </div>
                            <div class="col-lg-4" style="border-left: 1px solid #bebebe;">
                                <p class="h4 mb-3">Navigasi</p>
                                <ul>
                                    <?php $__currentLoopData = $all_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a class="<?php echo e($course->id_course == $data->id_course ? 'font-weight-bold' : ''); ?>" href="/admin/e-course/detail/<?php echo e($data->id_course); ?>">Chapter <?php echo e($data->chapter_nomor); ?>.<?php echo e($data->course_nomor); ?>: <?php echo e($data->course_judul); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
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
    <?php echo $__env->make('template/admin/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/bisa.co.id/public_html/bisa-v2/resources/views/e-course/admin/detail.blade.php ENDPATH**/ ?>