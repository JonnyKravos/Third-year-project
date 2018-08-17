@extends('layouts.app')

@section('title', '| Edit Forum Posts')

@section('content')

	<div class="row">
		{!! Form::model($forumpost, ['route' => ['forumposts.update', $forumpost->id]]) !!}
		<div class="col-md-7">
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, ["class" => 'form-control input-lg']) }}
			<p></p>
			{{ Form::label('publication_id', 'Paper:') }}
			{{ Form::select('publication_id', $publications, null, ['class' =>'form-control']) }}
			<p></p>
			{{ Form::label('body', 'Body:', ["class" => 'edit-margin']) }}
			{{ Form::textarea('body', null, ["class" => 'form-control']) }}
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
					<div class="col-md-6">
						{!! Html::linkRoute('forumposts.show', 'Go back', [$forumpost->id], ['class' => 'btn btn-primary btn-block']) !!}	
					</div>
					<div class="col-md-6">
						{{ csrf_field() }}
					  	{{ method_field('PUT') }}﻿
						{{ Form::submit('Save', ['class' => 'btn btn-success btn-margin btn-block']) }}
					</div>

					<div class="col-md-12">
						{!! Html::linkRoute('forumposts.index', '<< View all posts', [$forumpost->id], ['class' => 'btn btn-info btn-outline btn-margin-down btn-block']) !!}	
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection