@extends('layouts.app')

@section('title', '| Post')

@section('content')

	<div class="row">
		<div class="col-md-7">
			<h1>Title: {{ $forumpost->title }}</h1>
			@if($forumpost->publication->name != 'None')
				<h2>Paper: {{ $forumpost->publication->name }}</h2>
			@endif

			<p class="lead">{{ $forumpost->body }}</p>
		</div>

		<div class="col-md-5">
			<div class = "well">
				<dl class="dl-horizontal">
					<dt>Created at:</dt>
					<dd>{{ date('H:i D M j, Y', strtotime($forumpost->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last updated at:</dt>
					<dd>{{ date('H:i D M j, Y', strtotime($forumpost->created_at)) }}</dd>
				</dl>

				<div class="row">
					@if ((Auth::user() == $forumpost->user) or Auth::guard('admin')->check())
						<div class="col-md-4">
							{!! Html::linkRoute('forumposts.index', 'Go back', null, ['class' => 'btn btn-primary btn-block']) !!}	
						</div>
						<div class="col-md-4">
							{!! Html::linkRoute('forumposts.edit', 'Edit post', [$forumpost->id], ['class' => 'btn btn-warning btn-block']) !!}	
						</div>
						<div class="col-md-4">
							{!!  Form::open(['route' => ['forumposts.destroy', $forumpost->id], 'method' => 'DELETE ']) !!}

							{{ csrf_field() }}
						  	{{ method_field('DELETE') }}﻿
							{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-margin btn-block']) !!}

							{!! Form::close() !!}
						</div>
					@else
						<div class="col-md-4"></div>
						<div class="col-md-4">
							{!! Html::linkRoute('forumposts.index', 'Go back', null, ['class' => 'btn btn-primary btn-block']) !!}
						</div>
						<div class="col-md-4"></div>
					@endif
				</div>
			</div>
		</div>
	</div>
	<hr>

	<div class="row">
		<div class="col-md-8">
			<h2 class="comments-title"><span class="glyphicon glyphicon-comment"></span> Comments:</h2>
			@foreach($forumpost->comments as $comment)
				<div class="comment">
					<div class="user-info">
						<div class="user-name">
							<h4>{{ $comment->user->name }}</h4>
						</div>
						<p class="user-time">{{ date('D M j, Y', strtotime($comment->created_at)) }}</p>
					</div>
					<div class="comment-content">
						{{ $comment->comment }}
					</div>
					@if ((Auth::user() == $comment->user) or Auth::guard('admin')->check())
					<div class="comment-icons">
						<div class="edit-icon">
							<a href="{{ route('comments.edit', $comment->id) }}" class="btn-1 btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
						</div>
							<div class="delete-btn">
								{!!  Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE ']) !!}

									{{ csrf_field() }}
								  	{{ method_field('DELETE') }}﻿
									{!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger', 'style' => 'margin-right: 15px;']) !!}

								{!! Form::close() !!}</div>
					</div>
					@endif
				</div>
			@endforeach
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="col-md-8">
			{{ Form::open(['route' => ['comments.store', $forumpost->id], 'method' => 'POST']) }}

				<div class="row">
					<div class="col-md-12">
						{{ Form::label('comment', "Add a comment:") }}
						{{ Form::textarea('comment', null, ['class' => 'form-control']) }}

						{{ Form::submit('Add comment', ['class' => 'btn btn-primary btn-block', 'style' => 'margin-top:15px;']) }}
					</div>
				</div>

			{{ Form::close() }}
		</div>

@endsection