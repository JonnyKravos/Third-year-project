<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mike E Brown @yield('title')</title>
		<link rel="stylesheet" href="/css/app.css">
		<link rel="stylesheet" href="/css/styles.css">
	</head>
<body>
	@include('partials._navbar')

	<div class="container">
		@if(Request::is('/'))
		@include('partials._showcase')
		@endif

		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
				@include('partials._messages')
			</div>
			<div class="col-md-2">
			</div>
		</div>
		@yield('content')

		</div>
	</div>

	<footer id="footer" class="text-center">
		<p>Copyright 2017 &copy; Jonny</p>
	</footer>

	@include('partials._js')
</body>
</html>