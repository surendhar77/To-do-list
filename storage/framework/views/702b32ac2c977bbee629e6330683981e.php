

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		
    <div class="col-md-12 ">
	<h3>View Task List</h3>
    <div class="panel panel-info">
				<div class="panel-heading">Task List</div>
				<div class="panel-body col-md-12">
					<?php if(count($tasks)): ?>
					<table class="table table-hover" id="taskListTable">
						<thead>
							<tr>
                                <th style="width: 0%">S.No</th>
								<th>Name</th>
								<th class="col-md-6">Description</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
                                <td>
                                    <?php echo e($task->id); ?>

                                </td>
								<!-- Task name -->
								<td>
									<?php if($task->status): ?>
									<del><?php echo e($task->title); ?></del>
									<?php else: ?>
									<?php echo e($task->title); ?>

									<?php endif; ?>
								</td>
								<!--todo description-->
								<td>
									<?php if($task->status): ?>
									<del><?php echo e($task->description); ?></del>
									<?php else: ?>
									<?php echo e($task->description); ?>

									<?php endif; ?>

								</td>
                                <td>
                                    <?php if($task->status==0): ?>
                                    <span class="label label-danger">InComplete</span>
                                    <?php else: ?>
                                    <span class="label label-success">Complete</span>
                                    <?php endif; ?>
                                </td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
					<?php else: ?>
					<p class="text-center">
						<span class="glyphicon glyphicon-ice-lolly-tasted" aria-hidden="true"></span> You don't have any task yet. Start adding new task using the input above!
					</p>
					<?php endif; ?>
				</div>
			</div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-to-do-task-list\resources\views/tasks/show.blade.php ENDPATH**/ ?>