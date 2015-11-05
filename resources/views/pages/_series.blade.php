<!-- pages/_series.blade.php -->

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
					<td class="col-sm-2 highlightable">{{ $series->name }}</td>
					<td class="col-sm-1"><a href="http://www.imdb.com/title/{{ $series->series->imdb }}/" target="_blank">{{ $series->series->imdb }}</a></td>
					<td class="col-sm-2">{{ $series->series->release_year }}</td>
					<td class="col-sm-1">{{ $series->series->language->language }}</td>
					<td class="col-sm-1">{{ $series->series->quality->quality }}</td>
					<td class="col-sm-4 highlightable">{{ $series->description }}</td>
					<td class="col-sm-1">${{ number_format($series->price, 2) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	{{ $emptyMovieMsg or 'No series to show' }}
@endif