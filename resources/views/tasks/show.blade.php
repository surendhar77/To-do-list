@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		
    <div class="col-md-12 ">
	<h3>View Task List</h3>
    <div class="panel panel-info">
				<div class="panel-heading">Task List</div>
				<div class="panel-body col-md-12">
					@if(count($tasks))
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
							@foreach($tasks as $task)
							<tr>
                                <td>
                                    {{$task->id}}
                                </td>
								<!-- Task name -->
								<td>
									@if($task->status)
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
                                    @if($task->status==0)
                                    <span class="label label-danger">InComplete</span>
                                    @else
                                    <span class="label label-success">Complete</span>
                                    @endif
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
				</div>
			</div>
    </div>
</div>
</div>
@endsection