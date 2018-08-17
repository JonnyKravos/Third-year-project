@extends('layouts.app')

@section('title', '| About me')

@section('content')
<div class="row">
	<div class="col-md-8 col-lg-8">
		<H1>About</H1>
		<p>Mike Brown is the Richard and Barbara Rosenberg Professor of Planetary Astronomy at the California Institute of Technology and has been on the faculty there since 1996. He specializes in the discovery and study of bodies at the edge of the solar system. Among his numerous scientific accomplishments, he is best known for his discovery of Eris, the most massive object found in the solar system in 150 years, and the object which led to the debate and eventual demotion of Pluto from a real planet to a dwarf planet. Feature articles about Brown and his work have appeared in the New Yorker, the New York Times, and Discover, and his discoveries have been covered on front pages of countless newspapers worldwide. In 2006 he was named one of Time magazine's 100 Most Influential People as well as one of Los Angeles magazine's Most Powerful Angelinos. He has authored over 100 scientific paper. He is a frequent invited lecturer at astronomical meetings as well as at science museums, planetariums, and college campuses. At Caltech he teaches undergraduate and graduate students, in classes ranging from introductory geology to the formation and evolution of the solar system. He was especially pleased to be awarded the Richard P. Feynman Award for Outstanding Teaching at Caltech.</p>
		
		<p>Brown received his AB from Princeton in 1987, and then his MA and PhD from University of California, Berkeley, in 1990 and 1994, respectively. He has won many awards and honors for his scholarship, including the Urey Prize for best young planetary scientist from the American Astronomical Society's Division of Planetary Sciences; a Presidential Early Career Award; a Sloan Fellowship; the 2012 Kavli Prize in Astrophysics, and, of course, the one that started his career, an honorable mention in his fifth-grade science fair. He was inducted into the National Academy of Science in 2014. He was also named one of Wired Online's Top Ten Sexiest Geeks in 2006, the mention of which never ceases to make his wife laugh.</p>

		<p>Brown is the author of "How I Killed Pluto and Why It Had It Coming", an award winning best selling memoir of the discoveries leading to the demotion of Pluto..</p>
	</div>
	<div class="col-md-4">
		@include('partials._sidebar')
	</div>
</div>
@endsection