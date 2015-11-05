<!-- pages/_movies.blade.php -->

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
					<td class="col-sm-2 highlightable">{{ $movie->name }}</td>
					<td class="col-sm-1"><a href="http://www.imdb.com/title/{{ $movie->movie->imdb }}/" target="_blank">{{ $movie->movie->imdb }}</a></td>
					<td class="col-sm-1">{{ $movie->movie->release_year }}</td>
					<td class="col-sm-1">{{ $movie->movie->language->language }}</td>
					<td class="col-sm-1">{{ $movie->movie->quality->quality }}</td>
					<td class="col-sm-5 highlightable">{{ $movie->description }}</td>
					<td class="col-sm-1">${{ number_format($movie->price, 2) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	{{ $emptyMovieMsg or 'No movies to show' }}
@endif