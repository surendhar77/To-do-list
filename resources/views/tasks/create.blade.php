@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	
		<div class="col-md-8 col-md-offset-2">

		<h3>   New task </h3>
     

        	<!-- Display validation errors -->
				@include('commons.errors')

        <form action="{{ route('store')}}" method="POST">
				{{ csrf_field() }}

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
	
    @endsection