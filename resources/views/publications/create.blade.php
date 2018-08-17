@extends('layouts.app')

@section('title', '| create new forum post')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Create new post</h2>
			<hr>

			{!! Form::open(['route' => 'publications.store']) !!}
		    	<div class="form-group">
		    		{{Form::label('name', 'Name:')}}
		    		{{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter paper name'])}}
		    	</div>
		    	<div class="form-group">
		    		{{Form::label('link', 'Link:')}}
		    		{{Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'Enter the hyperlink for the paper'])}}
		    	</div>
		    	<div>
		    		{{form::submit('Submit', ['class' => 'btn btn-primary btn-lg btn-block'])}}
		    	</div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection