@extends('layouts.app')

@section('title', '| create new forum post')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Create new post</h2>
			<hr>

			{!! Form::open(['route' => 'forumposts.store']) !!}
		    	<div class="form-group">
		    		{{ Form::label('title', 'Title:') }}
		    		{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter title']) }}
		    	</div>
		    	<div class="form-group">
		    		{{ Form::label('publication_id', 'Paper:') }}
		    		<select class="form-control" name="publication_id">
		    			
		    			@foreach ($publications as $publication)
		    			<option value='{{ $publication->id }}'>{{ $publication->name }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	<div class="form-group">
		    		{{ Form::label('body', 'Post body:') }}
		    		{{ Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Enter body']) }}
		    	</div>
		    	<div>
		    		{{ form::submit('Submit', ['class' => 'btn btn-primary btn-lg btn-block']) }}
		    	</div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection