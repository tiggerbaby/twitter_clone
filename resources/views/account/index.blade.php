@extends('master')

@section('title', 'Account')
@section('meta-description','Welcome to your account page')

@section('content')
<div class="container">
<h1>Hi there {{ \Auth::user()->name }}</h1>


@endsection