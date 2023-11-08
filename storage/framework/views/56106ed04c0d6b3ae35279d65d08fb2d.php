

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
	
		<div class="col-md-8 col-md-offset-2">

		<h3>   New task </h3>
     

        	<!-- Display validation errors -->
				<?php echo $__env->make('commons.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <form action="<?php echo e(route('store')); ?>" method="POST">
				<?php echo e(csrf_field()); ?>


				<div class="form-group">
					<div class="input-group">
						<!-- New task name -->
						<label for="newTaskName" class="sr-only">New Task Name</label>
						<input type="text" name="title" id="newTaskName" class="form-control" placeholder="Enter task name" required><br><br><br>
						                        <!--new task description-->
												<label for="newTaskName" class="sr-only">Update  Description</label>
						<textarea name="description" id="description" class="form-control" placeholder="Enter description" cols="100" rows="10"></textarea>
						
					
					</div>
				</div>

					<!-- Add task button -->
					<span class="input-group-btn">
							<button class="btn btn-primary" type="submit">Add Task</button>
						</span>

			
			</form>		

            </div>
        </div>
    </div>
	
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-sample-intermediate-task-list-master\laravel-sample-intermediate-task-list-master\resources\views/tasks/create.blade.php ENDPATH**/ ?>