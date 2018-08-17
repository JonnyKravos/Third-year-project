@extends('layouts.app')

@section('title', '| Edit Forum Posts')

@section('content')

	<div class="row">
		{!! Form::model($publication, ['route' => ['publications.update', $publication->id]]) !!}
		<div class="col-md-7">
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name', null, ["class" => 'form-control input-lg']) }}
			<p></p>
			{{ Form::label('link', 'Link:') }}
			{{ Form::text('link', null, ["class" => 'form-control input-lg']) }}
			<p></p>
		</div>

		<div class="col-md-5">
			<div class = "well">
				<dl class="dl-horizontal">
				</dl>

				<dl class="dl-horizontal">
				</dl>

				<div class="row">
					<div class="col-md-6">
						{!! Html::linkRoute('publications.index', 'Go back', [$publication->id], ['class' => 'btn btn-primary btn-block']) !!}	
					</div>
					<div class="col-md-6">
						{{ csrf_field() }}
					  	{{ method_field('PUT') }}﻿
						{{ Form::submit('Save', ['class' => 'btn btn-success btn-margin btn-block']) }}
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection