<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php echo $__env->make('template/guest/_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style type="text/css">
        .main-menu {padding-right: 10px;}
    	.main-menu li a {padding: 50px 5px; margin-right: 30px;}
		.header-section {background: linear-gradient(180deg, #340369, transparent);}
        .header-right .hr-btn {padding: 28px 30px; margin-right: 15px; opacity: 0.7; line-height: 1; color: #000; background-color: #fff000;}
        .header-right .hr-btn:hover {opacity: 1; transition: .2s ease-in;}
    	.header-right .hr-btn.hr-btn-2 {padding: 28px 30px; min-width: auto; margin-right: 15px; background-color: #fdd100;}
        .footer-section {background-color: #46157a;}
        .footer-widget ul li {margin-bottom: 5px;}
    </style>
    <?php echo $__env->yieldContent('css-extra'); ?>
</head>
<body>
    <?php echo $__env->make('template/guest/_preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('template/guest/_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('template/guest/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('template/guest/_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('js-extra'); ?>
</body>
</html>
<?php /**PATH D:\XAMPP\htdocs\campusdigital\resources\views/template/guest/main.blade.php ENDPATH**/ ?>