@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 ">
			<a class="btn btn-primary float-right" href="{{route('create')}}">Create Task</a>
			<a class="btn btn-warning float-right glyphicon glyphicon-list-alt" href="{{route('view')}}" style="margin-left:73%">
				ViewTask</a>

			<div class="btn-group pull-right">
				<button type="button" class="btn btn-danger glyphicon glyphicon-filter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Filter
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="{{route('home')}}" class="dropdown-item">All</a>
						<a class="dropdown-item completed" href="{{route('completed')}}">Completed</a>
						<a class="dropdown-item incompleted" href="{{route('incompleted')}}">InCompleted</a>
					</li>
				</ul>
			</div>
			<br><br>

			<!-- Current tasks -->
			<div class="panel panel-info">
				<div class="panel-heading">Tasks</div>
				<div class="panel-body col-md-12">
					@if(count($tasks))
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
							@foreach($tasks as $task)
							<tr>
								<!-- Task name -->
								<td>
									@if($task->status )
									<del>{{ $task->title }}</del>
									@else
									{{ $task->title }}
									@endif
								</td>
								<!--todo description-->
								<td>
									@if($task->status)
									<del>{{ $task->description }}</del>
									@else
									{{ $task->description }}
									@endif

								</td>
								<td>
								@if($task->status)
									<span class="label label-success">Completed</span>
									@else
									<span class="label label-danger">InCompleted</span>
									@endif
								</td>
								<td style="padding-left: 3%;">
									<!-- Mark as completed/incompleted button -->
									<form class="inline" action="{{ route('status',$task->id) }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('PATCH') }}

										@if($task->status)
										<button class="btn btn-danger" type="submit" aria-label="InCompleted" title="Mark as incomplete">
											<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
										</button>
										@else
										<button class="btn btn-success" type="submit" aria-label="Completed" title="Mark as completed">
											<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
										</button>
										@endif
									</form>

									<!--Edit--->
									<a class="btn btn-default" href="{{route('edit',$task->id)}}" aria-label="edit" title="Edit task">
										<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
									</a>
									<!-- Delete button -->
									<form class="inline" action="{{ route('delete',$task->id) }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}

										<button class="btn btn-default" type="submit" aria-label="Delete" title="Delete task">
											<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
										</button>
									</form>

								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
					<p class="text-center">
						<span class="glyphicon glyphicon-ice-lolly-tasted" aria-hidden="true"></span> You don't have any task yet. Start adding new task using the input above!
					</p>
					@endif
					<!--Pagination-->

					<div class="d-flex justify-content-center">
						{{ $tasks->links() }}
					</div>
					<div class="d-flex justify-content-center">
						Showing {{($tasks->currentpage()-1)*$tasks->perpage()+1}} to {{$tasks->currentpage()*$tasks->perpage()}}
						of {{$tasks->total()}} entries
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

@endsection