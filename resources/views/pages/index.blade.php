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
		<div id="moviesData" class="panel"><br>
			@if(sizeof($movies) != 0)
				<table class="table table-striped sortable">
					<thead>
						<th>Title</th>
						<th>IMDB</th>
						<th>Year</th>
						<th>Language</th>
						<th>Quality</th>
						<th>Plot</th>
						<th>Price</th>
					</thead>
					<tbody>
						@foreach($movies as $movie)
							<tr>
								<td class="col-sm-2">{{ $movie->name }}</td>
								<td class="col-sm-1">{{ $movie->movie->imdb }}</td>
								<td class="col-sm-1">{{ $movie->movie->release_year }}</td>
								<td class="col-sm-1">{{ $movie->movie->language->language }}</td>
								<td class="col-sm-1">{{ $movie->movie->quality->quality }}</td>
								<td class="col-sm-5">{{ $movie->description }}</td>
								<td class="col-sm-1">{{ $movie->price }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@else
				{{ $emptyMovieMsg or 'No movies to show' }}
			@endif
		</div>

		<div id="seriesToggle" class="toggle"><h4>Series</h4></div>
		<div id="seriesData" class="panel"><br>
			@if(sizeof($series) != 0)
				<table class="table table-striped sortable">
					<thead>
						<th>Title</th>
						<th>IMDB</th>
						<th>Year</th>
						<th>Language</th>
						<th>Quality</th>
						<th>Plot</th>
						<th>Price / Episode</th>
					</thead>
					<tbody>
						@foreach($series as $series)
							<tr>
								<td class="col-sm-2">{{ $series->name }}</td>
								<td class="col-sm-1">{{ $series->series->imdb }}</td>
								<td class="col-sm-2">{{ $series->series->release_year }}</td>
								<td class="col-sm-1">{{ $series->series->language->language }}</td>
								<td class="col-sm-1">{{ $series->series->quality->quality }}</td>
								<td class="col-sm-4">{{ $series->description }}</td>
								<td class="col-sm-1">{{ $series->price }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@else
				{{ $emptyMovieMsg or 'No series to show' }}
			@endif
		</div>

	</div>
@stop