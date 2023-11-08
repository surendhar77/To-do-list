<?php if(count($errors)): ?>
	
	<!-- Form Error List -->
	<div class="form-group">
		<div class="alert alert-danger" role="alert">
			<strong>Whoops! Something went wrong!</strong>
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
	</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\laravel-sample-intermediate-task-list-master\laravel-sample-intermediate-task-list-master\resources\views/commons/errors.blade.php ENDPATH**/ ?>