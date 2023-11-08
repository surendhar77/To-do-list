

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 ">
			<a class="btn btn-primary float-right" href="<?php echo e(route('create')); ?>">Create Task</a>
			<a class="btn btn-warning float-right glyphicon glyphicon-list-alt" href="<?php echo e(route('view')); ?>" style="margin-left:73%">
				ViewTask</a>

			<div class="btn-group pull-right">
				<button type="button" class="btn btn-danger glyphicon glyphicon-filter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Filter
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="<?php echo e(route('home')); ?>" class="dropdown-item">All</a>
						<a class="dropdown-item completed" href="<?php echo e(route('completed')); ?>">Completed</a>
						<a class="dropdown-item incompleted" href="<?php echo e(route('incompleted')); ?>">InCompleted</a>
					</li>
				</ul>
			</div>
			<br><br>

			<!-- Current tasks -->
			<div class="panel panel-info">
				<div class="panel-heading">Tasks</div>
				<div class="panel-body col-md-12">
					<?php if(count($tasks)): ?>
					<table class="table table-hover" id="taskListTable">
						<thead>
							<tr>
								<th>Name</th>
								<th class="col-md-5">Description</th>
								<th>Status</th>
								<th style="padding-left:3%;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<!-- Task name -->
								<td>
									<?php if($task->status ): ?>
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
								<?php if($task->status): ?>
									<span class="label label-success">Completed</span>
									<?php else: ?>
									<span class="label label-danger">InCompleted</span>
									<?php endif; ?>
								</td>
								<td style="padding-left: 3%;">
									<!-- Mark as completed/incompleted button -->
									<form class="inline" action="<?php echo e(route('status',$task->id)); ?>" method="POST">
										<?php echo e(csrf_field()); ?>

										<?php echo e(method_field('PATCH')); ?>


										<?php if($task->status): ?>
										<button class="btn btn-danger" type="submit" aria-label="InCompleted" title="Mark as incomplete">
											<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
										</button>
										<?php else: ?>
										<button class="btn btn-success" type="submit" aria-label="Completed" title="Mark as completed">
											<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
										</button>
										<?php endif; ?>
									</form>

									<!--Edit--->
									<a class="btn btn-default" href="<?php echo e(route('edit',$task->id)); ?>" aria-label="edit" title="Edit task">
										<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
									</a>
									<!-- Delete button -->
									<form class="inline" action="<?php echo e(route('delete',$task->id)); ?>" method="POST">
										<?php echo e(csrf_field()); ?>

										<?php echo e(method_field('DELETE')); ?>


										<button class="btn btn-default" type="submit" aria-label="Delete" title="Delete task">
											<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
										</button>
									</form>

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
					<!--Pagination-->

					<div class="d-flex justify-content-center">
						<?php echo e($tasks->links()); ?>

					</div>
					<div class="d-flex justify-content-center">
						Showing <?php echo e(($tasks->currentpage()-1)*$tasks->perpage()+1); ?> to <?php echo e($tasks->currentpage()*$tasks->perpage()); ?>

						of <?php echo e($tasks->total()); ?> entries
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- <script>
  $(document).ready(function(){
  
	console.log("hiii");
  });
</script> -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-to-do-task-list\resources\views/tasks/filter.blade.php ENDPATH**/ ?>