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
     
     <article class="tweet">
     	<p class="bg-success">{{ $tweet->content }}</p>
     	<p class="bg-success">Posted: {{ $tweet->created_at }} by {{ $tweet->user->name }}</p>
     </article>

 @endforeach

@endsection