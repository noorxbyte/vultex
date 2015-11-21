<!-- videos/show.blade.php -->

@extends('master')

@section('content')

	<input type="hidden" id="imdbShow" value="{{ $record->video->imdb }}">

	<div class="row">

		<div class="col-sm-2"></div>

		<div class="col-sm-4 text-right">
			<img src="{{ file_exists(public_path() . $record->video->poster)?$record->video->poster:'/img/null.jpg' }}" alt="Poster Image" class="img-responsive img-thumbnail">
		</div>

		<div class="col-sm-4">
			<div class="pull-left">
				<table class="table table-nonfluid">
					<tbody>
						<tr>
							<td><b>Title:</b></td>
							<td>{{ $record->name }}</td>
						</tr>
						<tr>
							<td><b>Director:</b></td>
							<td><span id="director"></span></td>
						</tr>
						<tr>
							<td><b>IMDB:</b></td>
							<td><a href="http://www.imdb.com/title/{{ $record->video->imdb }}/" target="_blank">{{ $record->video->imdb }}</a> (Rating <span id="rating"></span>)</td>
						</tr>
						<tr>
							<td><b>Released:</b></td>
							<td><span id="released">{{ date_format(date_create($record->video->release_date), 'M d, Y') }}</span></td>
						</tr>
						<tr>
							<td><b>Language:</b></td>
							<td>{{ $record->video->language->name }}</td>
						</tr>
						<tr>
							<td><b>Genre:</b></td>
							<td><span id="genre"></span></td>
						</tr>
						<tr>
							<td><b>Rated:</b></td>
							<td><span id="rated"></span></td>
						</tr>
						<tr>
							<td><b>Runtime:</b></td>
							<td><span id="runtime"></span></td>
						</tr>
						<tr>
							<td><b>Actors:</b></td>
							<td><span id="actors"></span></td>
						</tr>
						<tr>
							<td><b>Awards:</b></td>
							<td><span id="awards"></span></td>
						</tr>
						<tr>
							<td><b>Plot:</b></td>
							<td>{{ $record->description }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="col-sm-2"></div>

	</div>

@stop