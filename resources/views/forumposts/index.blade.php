@extends('layouts.app')

@section('title', '| All Forum Posts')

@section('content')


	<div class="row">
		<div class="col-md-10">
			<h1>All Forum Posts</h1>
		</div>

		@if (Auth::user())
		<div class="col-md-2">
			<a href="{{ route('forumposts.create') }}" class="btn btn-lg btn-block btn-align btn-primary">Create a post</a>
		</div>
		@endif
		<div class="col-md-12">
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>Title</th>
					<th>Paper</th>
					<th>Body</th>
					<th>Author</th>
					<th>Created at:</th>
					<th></th>
				</thead>

				<tbody>
					@foreach ($forumposts as $forumpost)
						<tr>
							<td>{{ $forumpost->title }}</td>
							<td>{{ $forumpost->publication->name }}</td>
							<td>{{ substr($forumpost->body, 0, 49) }}{{ strlen($forumpost->body) > 50 ? "..." : "" }}</td>
							<td>{{ $forumpost->user->name }}
							<td>{{ date('D M j, Y', strtotime($forumpost->created_at)) }}</td>
							<td><a href="{{ route('forumposts.show', $forumpost->id) }}" class="btn btn-info">View</a> 
								@if ((Auth::user() == $forumpost->user) or Auth::guard('admin')->check())
									<a href="{{ route('forumposts.edit', $forumpost->id) }}" class="btn btn-warning">Edit </a>
								@endif
							</td>
						</tr>

					@endforeach

				</tbody>
			</table>

			<div class="text-center">
				 {!! $forumposts->links(); !!}
			</div>
	</div>
</div>

@endsection