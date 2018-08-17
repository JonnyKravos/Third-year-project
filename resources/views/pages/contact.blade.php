@extends('layouts.app')

@section('title', '| Contact')

@section('content')
<div class="row">
    <div class="col-md-8 col-lg-8">
    	<H1>Contact</H1>
    	{!! Form::open(['url' => 'contact/submit']) !!}
        	<div class="form-group">
        		{{Form::label('name', 'Name')}}
        		{{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter name'])}}
        	</div>
        	<div class="form-group">
        		{{Form::label('email', 'E-Mail Address')}}
        		{{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter email'])}}
        	</div>
        	<div class="form-group">
        		{{Form::label('message', 'Message')}}
        		{{Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Enter message'])}}
        	</div>
        	<div>
        		{{form::submit('Submit', ['class' => 'btn btn-primary'])}}
        	</div>
    	{!! Form::close() !!}
    </div>
</div>
@endsection