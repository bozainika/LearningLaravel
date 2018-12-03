@extends('master')
@section('title','Create post')
@section('content')
<div class="container col-md-8 col-md-offset-2">
	<div class=" well well bs-component">
		<form class="form-horizontal" method="post">
			@foreach($errors->all() as $error)
				<p class="alert alert-danger">{{$error}}</p>
			@endforeach
			@if(session('status'))
				<div class="alert alert-success">
					{{session('status')}}
				</div>
			@endif
			{{csrf_field()}}
			<fieldset>
				<legend>Create new post</legend>
				<div class="form-group">
					<label for="title" class="col-lg-2 control-label">Title</label>
					<div class="col-lg-10">
						<input class="form-control" type="text" name="title" placeholder="Title" id="title">
					</div>
				</div>
				<div class="form-group">
					<label for="content" class="col-lg-2 control-label">Content</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="3" name="content" id="content" placeholder="Your content here..."></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="category" class="col-lg-2 control-label">Categories</label>
					<div class="col-lg-10">
							<select class="form-control" id="category" name="category[]" multiple>
								@foreach($categories as $category)
									<option value="{{$category->id}}">
									{{$category->name}}
									</option>
								@endforeach
					
							</select>
						</div>
				</div>
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<button type="reset" class="btn btn-default">Cancel</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
@endsection