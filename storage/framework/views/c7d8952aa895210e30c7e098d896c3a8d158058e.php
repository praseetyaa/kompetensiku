<table border="1">
	<tr>
		<td align="center" width="5"><strong>No.</strong></td>
		<td align="center" width="50"><strong>Karakteristik A</strong></td>
		<td align="center" width="50"><strong>Karakteristik B</strong></td>
		<td align="center" width="50"><strong>Karakteristik C</strong></td>
		<td align="center" width="50"><strong>Karakteristik D</strong></td>
		<td align="center" width="10"><strong>DISC A</strong></td>
		<td align="center" width="10"><strong>DISC B</strong></td>
		<td align="center" width="10"><strong>DISC C</strong></td>
		<td align="center" width="10"><strong>DISC D</strong></td>
	</tr>
	<?php $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td><?php echo e($data->nomor); ?></td>
		<td><?php echo e($data->soal[0]['pilihan']['A']); ?></td>
		<td><?php echo e($data->soal[0]['pilihan']['B']); ?></td>
		<td><?php echo e($data->soal[0]['pilihan']['C']); ?></td>
		<td><?php echo e($data->soal[0]['pilihan']['D']); ?></td>
		<td align="center"><?php echo e($data->soal[0]['disc']['A']); ?></td>
		<td align="center"><?php echo e($data->soal[0]['disc']['B']); ?></td>
		<td align="center"><?php echo e($data->soal[0]['disc']['C']); ?></td>
		<td align="center"><?php echo e($data->soal[0]['disc']['D']); ?></td>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/soal/admin/excel.blade.php ENDPATH**/ ?>