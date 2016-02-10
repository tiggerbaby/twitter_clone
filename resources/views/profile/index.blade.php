@extends('master')

@section('title', 'Account')
@section('meta-description','Welcome to your account page')

@section('content')
<div class="container">
<h1>Hi there {{ \Auth::user()->name }}</h1>
<p>Account status</p>
<ul>
	<li class="text-success">Total Tweets: {{ $totalTweets}}</li>
</ul>
<h2>Write a new Tweet.</h2>

<form action="/profile/new-tweet" method="post">
{!! csrf_field()!!}
  <div class="form-group">
    <label for="content">Tweet:</label>
    <textarea class="form-control" name="content" id="content" cols="30" rows"10" >{{ old('content') }} </textarea> 
  </div>
  
  <button type="submit" class="btn btn-default">Post</button>

</form>
@if(count($errors))
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif	
@endsection