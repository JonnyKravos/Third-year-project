@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8 col-lg-8">
		<H1>Messages</H1>
		@if(count($messages) > 0)
			@foreach($messages as $message)
				<ul class="list-group">
					<li class="list-group-item">Name: {{$message->name}}</li>
					<li class="list-group-item">Email: {{$message->email}}</li>
					<li class="list-group-item">Message: {{$message->message}}</li>
				</ul>
			@endforeach
		@endif
	</div>
</div>
@endsection

@section('sidebar')
	@parent
	<p>This is appended to the sidebar</p>
@endsection