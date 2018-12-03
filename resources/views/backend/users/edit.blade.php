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
					<div class="form-group">
						<label for="email" class="col-lg-2 control-label">Email</label>
						<div class="col-lg-10">
							<input type="email" class='form-control'name="email" id="email" placeholder="Email" value="{{ $user->email }}">
						</div>
					</div>
					<div class="'form-group">
						<label for="select" class="col-lg-2 control-label">Role</label>
						<div class="col-lg-10">
							<select class="form-control" id="role" name="role[]" multiple>
								@foreach($roles as $role)
									<option value="{{$role->id}}"
									@if(in_array($role->id, $selectedRoles))
									selected='selected'
									@endif>	
									{{$role->display_name}}
									</option>
								@endforeach
								
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for='password' class="col-lg-2 control-label">Password</label>
						<div class="col-lg-10">
							<input type="password" class="form-control" name="password">
						</div>
					</div>
					<div class="form-group">
						<label for="confirm_password" class="col-lg-2 control-label">Confirm password</label>
						<div class="col-lg-10">
							<input type="password" class="form-control" name="confirm_password">
						</div>
					</div>
					<div class="form-group">
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