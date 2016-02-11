@extends('master')

@section('title', '')
@section('meta-description','')

@section('content')
<div class="container">
  <header id="user-profile">
  <img src="" alt="" width="120" height="120">
    <h1>{{ $user->name }}</h1>
    <p>{{ $user->description }}</p>
 	<ul>
 		<li>Total tweets: {{ $user->tweets->count() }}</li>
 		<li></li>
 		<li></li>
 	</ul>
  </header>

 @foreach( $userPosts as $tweet )
     
     <article class="bg-success tweet">
     	<p>{{ $tweet->content }}</p>
     	<small>Posted: {{ $tweet->created_at }} by {{ $tweet->user->name }}</small>
 
     	<h2>Comments:</h2>

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