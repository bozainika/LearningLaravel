@extends('master')
@section('name','Edit user')
@section('content')
	<div class="container col-md-6 col-md-offset-3">
		<div class="well well bs-component">
			<form class="form-horizontal" method="post">
				@foreach($errors->all() as $error)
					<p class="alert alert-danger">{{ $error }}</p>	
				@endforeach
				@if(session('status'))
					<div class="alert alert-success">
						{{session('status')}}
					</div>
				@endif
					{{csrf_field()}}
				<fieldset>
					<legend>Edit user</legend>		
					<div class="form-group">
						<label for="name" class="col-lg-2 control-label">Name</label>
						<div class="col-lg-10">
							<input type="text" class='form-control'name="name" id="name" placeholder="Name" value="{{ $user->name }}">
						</div>
					</div>
						<div class="col-lg-10 col-lg-offset-2">
							<button type="reset" class="btn btn-default">Cancel</button>
							<button type="submit" class="btn-primary">Submit</button>
						</div>
					</div>
				</fieldset>

			</form>
		</div>
	</div>
@endsection