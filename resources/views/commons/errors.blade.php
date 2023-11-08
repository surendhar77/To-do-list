@if (count($errors))
	
	<!-- Form Error List -->
	<div class="form-group">
		<div class="alert alert-danger" role="alert">
			<strong>Whoops! Something went wrong!</strong>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
@endif