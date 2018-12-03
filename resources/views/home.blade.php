@extends('master')
@section('title', 'Home')
@section('content')
@if(session('status'))
	<div class="alert alert-danger">
		{{session('status')}}
	</div>
@endif
<div class="container">
<div class="row banner">
<div class="col-md-12">
<h1 class="text-center margin-top-100 editContent">
Learning Laravel 5
</h1>
<h3 class="text-center margin-top-100 editContent">Building Prac\
tical Applications</h3>
<div class="text-center">
<img src="http://learninglaravel.net/img/LearningLaravel5_co\
ver0.png" width="302" height="391" alt="">
</div>
</div>
</div>
</div>
@endsection