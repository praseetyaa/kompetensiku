<table border="1">
	<tr>
		<td align="center" width="5" style="background-color: <?php echo e(get_warna_sekunder()); ?>; color: <?php echo e(get_warna_primer()); ?>;"><strong>No.</strong></td>
		<td align="center" width="40" style="background-color: <?php echo e(get_warna_sekunder()); ?>; color: <?php echo e(get_warna_primer()); ?>;"><strong>Nama User</strong></td>
		<td align="center" width="40" style="background-color: <?php echo e(get_warna_sekunder()); ?>; color: <?php echo e(get_warna_primer()); ?>;"><strong>Email</strong></td>
		<td align="center" width="20" style="background-color: <?php echo e(get_warna_sekunder()); ?>; color: <?php echo e(get_warna_primer()); ?>;"><strong>Nomor HP</strong></td>
		<td align="center" width="15" style="background-color: <?php echo e(get_warna_sekunder()); ?>; color: <?php echo e(get_warna_primer()); ?>;"><strong>Role</strong></td>
		<td align="center" width="15" style="background-color: <?php echo e(get_warna_sekunder()); ?>; color: <?php echo e(get_warna_primer()); ?>;"><strong>Status</strong></td>
	</tr>
	<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td><?php echo e(($key+1)); ?></td>
        <td><?php echo e($data->nama_user); ?></td>
        <td><?php echo e($data->email); ?></td>
        <td align="center"><?php echo e($data->nomor_hp); ?></td>
        <td align="center"><?php echo e($data->nama_role); ?></td>
        <td align="center"><?php echo e($data->status == 1 ? 'Aktif' : 'Belum Aktif'); ?></td>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table><?php /**PATH /var/www/vhosts/campusdigital.id/public_html/laravel-v3/resources/views/user/admin/excel.blade.php ENDPATH**/ ?>