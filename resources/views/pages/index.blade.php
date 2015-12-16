<!-- pages/index.blade.php -->

@extends('master')

@section('content')

	<!-- data container -->
	<div class="data">

		<!-- display movie list -->
		<div id="moviesToggle" class="toggle"><h4>Movies</h4></div>
		<div id="moviesData" class="slider-panel"><br>
			<div class="list-group">
				@foreach($movies as $movie)
					<a href="{{ route('products.show', $movie->id) }}" class="list-group-item">{{ $movie->name }}<span class="badge">MVR {{ $movie->price }}</span></a>
				@endforeach
			</div>

			<a href="{{ route('videos', 'movies') }}"><div style="background-color:#F0F0F0;padding:10px" class="text-center">View All</div></a><br>
		</div>

		<div id="seriesToggle" class="toggle"><h4>Series</h4></div>
		<div id="seriesData" class="slider-panel"><br>
			<div class="list-group">
				@foreach($series as $series)
					<a href="{{ route('products.show', $series->id) }}" class="list-group-item">{{ $series->name }}<span class="badge">MVR {{ $series->price }}</span></a>
				@endforeach
			</div>

			<a href="{{ route('videos', 'series') }}"><div style="background-color:#F0F0F0;padding:10px" class="text-center">View All</div></a><br>
		</div>

		<div id="animeToggle" class="toggle"><h4>Anime</h4></div>
		<div id="animeData" class="slider-panel"><br>
			<div class="list-group">
				@foreach($animes as $anime)
					<a href="{{ route('products.show', $anime->id) }}" class="list-group-item">{{ $anime->name }}<span class="badge">MVR {{ $anime->price }}</span></a>
				@endforeach
			</div>

			<a href="{{ route('videos', 'animes') }}"><div style="background-color:#F0F0F0;padding:10px" class="text-center">View All</div></a><br>
		</div>

		<div id="videoToggle" class="toggle"><h4>Documentries</h4></div>
		<div id="videoData" class="slider-panel"><br>
			<div class="list-group">
				@foreach($videos as $video)
					<a href="{{ route('products.show', $video->id) }}" class="list-group-item">{{ $video->name }}<span class="badge">MVR {{ $video->price }}</span></a>
				@endforeach
			</div>

			<a href="{{ route('videos', 'videos') }}"><div style="background-color:#F0F0F0;padding:10px" class="text-center">View All</div></a><br>
		</div>

		<div id="gameToggle" class="toggle"><h4>Games</h4></div>
		<div id="gameData" class="slider-panel"><br>
			<div class="list-group">
				@foreach($games as $game)
					<a href="{{ route('products.show', $game->id) }}" class="list-group-item">{{ $game->name }}<span class="badge">MVR {{ $game->price }}</span></a>
				@endforeach
			</div>

			<a href="{{ route('games') }}"><div style="background-color:#F0F0F0;padding:10px" class="text-center">View All</div></a><br>
		</div>

	</div>
@stop