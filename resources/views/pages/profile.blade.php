@extends('layouts.app')

@section('title', '| My profile page')

@section('content')
<div class="row">
	<div class="col-md-8 col-lg-8">
		<H1>My profile page</H1>
		<h2>My details:</h2>
		<p>Name: {{ Auth::user()->name }}</p>
		<p>Email: {{ Auth::user()->email }}</p>
		<p>ID number: {{ Auth::user()->id }}</p>
	</div>
@endsection