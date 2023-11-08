@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		
		<div class="col-md-8 col-md-offset-2">
		<h3>Update Task</h3>

			
				<!-- Display validation errors -->
				@include('commons.errors')
			<form action="{{ route('update',$tasks->id) }}" method="POST">
				{{ csrf_field() }}

				<div class="form-group">
					<div class="input-group">
						<!-- updtae task name -->
						<label for="newTaskName" class="sr-only">Update title</label>
						<input type="text" name="title" id="newTaskName" class="form-control" placeholder="Enter title" value="{{$tasks->title}}" required><br><br><br>
                        <!--Update task description-->
                        <label for="newTaskName" class="sr-only">Update  Description</label>
						<textarea name="description" id="description" class="form-control" placeholder="Enter description" cols="100" rows="10" required>{{$tasks->description}}</textarea>
						
					
					</div>
				</div>

                	<!-- Add task button -->
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit"> Update </button>
						</span>

			
			</form>

            </div>
        </div>
    </div>

    @endsection