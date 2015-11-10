<!-- pages/index.blade.php -->

@extends('master')

@section('content')

	<!-- main navbar -->
	<div class="row">

		<!-- sorting and filter forms -->
		<span class="pull-left">
			
		</span>

		<!-- search form -->
		<span class="pull-right">
			{!! Form::open(['action' => 'PagesController@index', 'method' => 'GET', 'class' => 'form-inline']) !!}
				<div class="form-group">
					{!! Form::input('search', 'q', null, ['id' => 'search', 'class' => 'form-control', 'placeholder' => 'Search Our Database']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Search', ['class' => 'btn btn-default']) !!}
				</div>
			{!! Form::close() !!}
		</span>

	</div><hr>

	<!-- data container -->
	<div class="data">

		<!-- display movie list -->
		<div id="moviesToggle" class="toggle"><h4>Movies</h4></div>
		<div id="moviesData" class="panel"><br>
			@include('pages._movies', ['movies' => $movies])
		</div>

		<div id="seriesToggle" class="toggle"><h4>Series</h4></div>
		<div id="seriesData" class="panel"><br>
			@include('pages._series', ['series' => $series])
		</div>

		<div id="animeToggle" class="toggle"><h4>Anime</h4></div>
		<div id="animeData" class="panel"><br>
			@include('pages._anime', ['anime' => $anime])
		</div>

		<div id="videoToggle" class="toggle"><h4>Video</h4></div>
		<div id="videoData" class="panel"><br>
			@include('pages._video', ['video' => $video])
		</div>

	</div>
@stop