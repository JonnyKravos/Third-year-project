@extends('layouts.app')

@section('title', '| Publications')

@section('content')

<div class="row">
		<div class="col-md-10">
			<h1>Publications</h1>
		</div>

		<div class="col-md-2">
			@if (Auth::guard('admin')->check())
			<a href="{{ route('publications.create') }}" class="btn btn-lg btn-block btn-align btn-primary">Create a post</a>
			@endif
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>

<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>Paper</th>
				</thead>

				<tbody>
					@foreach ($publications as $publication)
					@if($publication->name != 'None')
					<tr>
						<th>{{ $publication->name }}</th>
						@if (Auth::guard('admin')->check())
							<td><a href="{{ route('publications.edit', $publication->id) }}" class="btn btn-warning">Edit</a></td>
							<td>{!!  Form::open(['route' => ['publications.destroy', $publication->id], 'method' => 'DELETE ']) !!}

								{{ csrf_field() }}
							  	{{ method_field('DELETE') }}﻿
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-spacing']) !!}

								{!! Form::close() !!}</td>
						@endif
						</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
</div>
@endsection
