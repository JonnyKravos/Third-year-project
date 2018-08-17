@extends('layouts.app')

@section('title', '| Edit comment')

@section('content')

	<div class="col-md-8 col-md-offset-2">
		<h1>Edit comment</h1>

		{{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}

			{{ Form::label('comment', 'Comment:') }}
			{{ Form::textarea('comment', null, ['class' => 'form-control']) }}

			{{ Form::submit('Update comment', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px;']) }}

		{{ Form::close() }}
	</div>

@endsection