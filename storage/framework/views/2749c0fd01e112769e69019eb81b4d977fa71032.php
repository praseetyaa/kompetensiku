

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
                <h4 class="page-title">Chapter: <?php echo e($chapter->chapter_judul); ?></h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/member">Home</a></li>
                            <li class="breadcrumb-item"><a href="/member/e-course">Materi E-Course</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($chapter->chapter_judul); ?></li>
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
                                <h5 class="mb-0">Chapter: <?php echo e($chapter->chapter_judul); ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
						<div class="col-12">
							<div class="row">
                                <?php $__currentLoopData = $video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 col-lg-3 col-xlg-3">
                                    <div class="card card-hover shadow">
                                        <a href="/member/e-course/detail/<?php echo e($course->id_course); ?>">
                                            <img class="card-img-top" src="<?php echo e($course->course_gambar != '' ? asset('assets/images/course/'.$course->course_gambar) : asset('assets/images/course/default.jpg')); ?>" alt="Gambar">
                                        </a>
                                        <div class="card-body">
                                            <!--<p class="h5"># Video <?php echo e($course->course_nomor); ?></p>-->
                                            <p class="course-title h4"><a href="/member/e-course/detail/<?php echo e($course->id_course); ?>" title="<?php echo e($course->course_judul); ?>"><?php echo e($course->course_judul); ?></a></p>
                                            <div class="course-caption"><div><?php echo e($course->course_caption); ?></div></div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->startSection('css-extra'); ?>

<style type="text/css">
	.course-title {line-height: 21px; height: 42px; display: -webkit-box !important; -webkit-line-clamp: 2; -moz-line-clamp: 2; -ms-line-clamp: 2; -o-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical; -ms-box-orient: vertical; -o-box-orient: vertical; box-orient: vertical; overflow: hidden; text-overflow: ellipsis;}
	.course-caption {line-height: 21px; height: 63px; display: -webkit-box !important; -webkit-line-clamp: 3; -moz-line-clamp: 3; -ms-line-clamp: 3; -o-line-clamp: 3; line-clamp: 3; -webkit-box-orient: vertical; -ms-box-orient: vertical; -o-box-orient: vertical; box-orient: vertical; overflow: hidden; text-overflow: ellipsis;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/member/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/campusdigital.id/public_html/laravel-v3/resources/views/e-course/member/videos.blade.php ENDPATH**/ ?>