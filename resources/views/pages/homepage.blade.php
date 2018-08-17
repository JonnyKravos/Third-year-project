@extends('layouts/app')

@section('title', '| Home page')

@section('content')
<div class="row">
	<div class="col-md-8">
		<H1>Welcome to my site</H1>
		<p>This new and updated site features a forum where you and fellow enthusiats can discuss my work, ask questions about it or simply use it as a way to further your knowledge on astrophysics. Or if you dont have time you can simly send me a direct message through the contact tab although the chance of a responce will be less due to class and work schedules.</p>
		<hr>
		<div class="row">
			<H1>How I Killed Pluto and Why It Had It Coming</H1>
			<hr>
				<div class="col-md-6">
					<p>My memoir on the discovery of Eris, the reclassification of Pluto, and my lack of sleep in between is, officially, an award winning best seller. It's also been translated into many languages that I can't read, including German, Japanese, Russian, and Korean. </p>
					<a href="https://www.amazon.com/gp/product/0385531087?ie=UTF8&tag=astrmikebrow-20&linkCode=as2&camp=1789&creative=9325&creativeASIN=0385531087" class="btn btn-info btn-sm">Buy now</a>
				</div>
				<div class="col-md-6">
					<img src="/How_I_killed_Pluto.jpg" width="250" height="300">
				</div>		
		</div>
	</div>
	<div class="col-md-4">
		@include('partials._sidebar')
	</div>
</div>
@endsection