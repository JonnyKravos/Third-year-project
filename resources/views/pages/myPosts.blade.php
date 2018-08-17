@extends('layouts.app')

@section('title', '| My Posts')

@section('content')


	<div class="row">
		<div class="col-md-10">
			<h1>My Forum Posts</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('forumposts.create') }}" class="btn btn-lg btn-block btn-align btn-primary">Create a post</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Paper</th>
					<th>Body</th>
					<th>Author</th>
					<th>Created at:</th>
					<th></th>
				</thead>

				<tbody>
					@foreach ($forumposts as $forumpost)
						@if (Auth::user() == $forumpost->user)
							
							<tr>
								<th>{{ $forumpost->id }}</th>
								<td>{{ $forumpost->title }}</td>
								<td>{{ $forumpost->paper }}</td>
								<td>{{ substr($forumpost->body, 0, 49) }}{{ strlen($forumpost->body) > 50 ? "..." : "" }}</td>
								<td>{{ $forumpost->user_id }}
								<td>{{ date('D M j, Y', strtotime($forumpost->created_at)) }}</td>
								<td><a href="{{ route('forumposts.show', $forumpost->id) }}" class="btn btn-info">View</a> 
									@if (Auth::user() == $forumpost->user)
										<a href="{{ route('forumposts.edit', $forumpost->id) }}" class="btn btn-warning">Edit </a>
									@endif
								</td>
							</tr>
						@endif
					@endforeach

				</tbody>
			</table>

			<div class="text-center">
				 {!! $forumposts->links(); !!}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5"></div>
		<div class="col-md-2">
			<a href="{{ route('forumposts.index') }}" class="btn btn-lg btn-block btn-align btn-primary">See all posts</a>
		</div>
	</div>

@endsection