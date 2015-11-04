<!-- pages/index.blade.php -->

@extends('master')

@section('content')

	<!-- main navbar -->
	<div class="row">

		<!-- sorting and filter forms -->
		<span class="pull-left">
			{!! Form::open(['action' => 'PagesController@index', 'method' => 'GET', 'class' => 'form-inline']) !!}
				<div class="form-group">
					{!! Form::text('q', null, ['class' => 'form-control', 'placeholder' => 'Search Our Database']) !!}
				</div>
				<div class="form-group">
					{!! Form::button('Search', ['class' => 'btn btn-default']) !!}
				</div>
			{!! Form::close() !!}
		</span>

		<!-- search form -->
		<span class="pull-right">
			{!! Form::open(['action' => 'PagesController@index', 'method' => 'GET', 'class' => 'form-inline']) !!}
				<div class="form-group">
					{!! Form::input('search', 'q', null, ['class' => 'form-control', 'placeholder' => 'Search Our Database']) !!}
				</div>
				<div class="form-group">
					{!! Form::button('Search', ['class' => 'btn btn-default']) !!}
				</div>
			{!! Form::close() !!}
		</span>

	</div><hr>

	<!-- data container -->
	<div class="data">

		<!-- display movie list -->
		<div id="moviesToggle" class="toggle"><h4>Movies</h4></div>
		<div id="moviesData" class="panel"><br><br>
			@if(sizeof($movies) != 0)
				Movies
			@else
				{{ $emptyMovieMsg or 'No movies to show' }}
			@endif
		</div>

		<div id="seriesToggle" class="toggle"><h4>Series</h4></div>
		<div id="seriesData" class="panel">
			@if(sizeof($series) != 0)
				Series
			@else
				{{ $emptyMovieMsg or 'No series to show' }}
			@endif
		</div>

	</div>
@stop