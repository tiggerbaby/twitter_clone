@extends('master')

@section('title', 'Register a new account')
@section('meta-description','Contact Us about any issues or comments')

@section('content')
<h1>Register new account</h1>
<form action="/register" method="post">
 {!! csrf_field() !!}	

	<div class="form-group">
		<label for="name">Full Name:</label>
		<input class="form-control" type="text" name="name" id="name" placeholder="Michael Jackson">
	</div>

	<div class="form-group">
		<label for="email">E-mail:</label>
		<input class="form-control" type="email" name="email" id="email" placeholder="mj@music.com">
	</div>
	<div class="form-group">
	  <label for="password">Password: </label>
	  <input  class="form-control" type="password" name="password" id="password">
	</div>
	<div class="form-group">
	  <label for="password_confirmation">Confirm Password: </label>
	  <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
	</div>

	<input type="submit" value="Register!">
</form>

@if(count($errors))
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif

@endsection