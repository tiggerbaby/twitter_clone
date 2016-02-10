@extends('master')

@section('title', 'Log in')
@section('meta-description','Log into your account to access all website functionality')

@section('content')
<div class="container">
<h1>Log in</h1>
	<form action="/login" method="post">
		{!! csrf_field()!!}
		<div class="form-group">
			<label for="email">E-Mail:</label>
			<input class="form-control" type="email" value="{{old('email')}}" name="email" placeholder="mj@music.com" id="email">
		</div>

		<div class="form-group">
			<label for="password">Password:</label>
			<input class="form-control" type="password" name="password" id="password">
		</div>
	 
	 <input type="submit" value="Log in">
	</form>

	
@if(count($errors))
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif	
@endsection