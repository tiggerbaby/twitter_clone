@extends('master')

@section('title', '')
@section('meta-description','')

@section('content')
<div class="container">
  <header id="user-profile">
  <img src="/profiles/{{ $user->profileImage }}" alt="" width="240">
    <h1>{{ $user->name }}</h1>
    <p>{{ $user->description }}</p>
 	<ul>
 		<li>Total tweets: {{ $user->tweets->count() }}</li>
 		<li></li>
 		<li></li>
 	</ul>
  </header>

 @if(count($errors))
 	<p class="text-danger">COMMENT FORM INVALID</p>
 @endif

 @foreach( $userPosts as $tweet )
     
     <article class="bg-success tweet">
     	<p>{{ $tweet->content }}</p>
     	<small>Posted: {{ $tweet->created_at }} by {{ $tweet->user->name }}</small>
 		@if(\Auth::check() && $tweet->user->id == \Auth::user()->id)

 		<a href="/profile/delete-tweet/{{ $tweet->id }}">Delete</a>

 		@endif

     	<h2>Comments:</h2>

     	@if(\Auth::check())
     	<form action="/profile/new-comment" method="post">
     		{!! csrf_field() !!}
           
     		<input type="hidden" name="tweet-id" value="{{ $tweet->id}}">

     	<div class="form-group">
     		<label for="comment">Comment: </label>
     		<textarea class="form-control" name="comment" id="comment" cols="30" rows="6"></textarea>

     		<input type="submit" value="Reply">
     	</form>
     	@endif

     @forelse($tweet->comments as $comment)
     	<article>
     		<p> {{ $comment->content }}</p>
     		<small>Written by {{ $comment->user->name }}</small>
     	</article>
     	@empty
     	<p>Be the first to reply!</p>
     	@endforelse
     	<hr>
     </article>
 
 @endforeach

@endsection