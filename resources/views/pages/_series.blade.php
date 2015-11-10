<!-- pages/_series.blade.php -->

@if(sizeof($series) != 0)
	<table class="table table-striped sortable">
		<thead>
			@if (Auth::check())
				<th>Actions</th>
			@endif
			<th>Title</th>
			<th>IMDB</th>
			<th>Year</th>
			<th>Genre</th>
			<th>Language</th>
			<th>Quality</th>
			<th>Plot</th>
			<th>Price / Episode</th>
		</thead>
		<tbody>
			@foreach($series as $series)
				<tr>
					@if (Auth::check())
						<td class="col-sm-1">
							<div class="dropdown">
								<button class="btn btn-default dropdown-toggle btn-xs" type="button" data-toggle="dropdown">Actions
								<span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="#">Edit</a></li>
									<li><a href="#" class="btn-del">Delete</a></li>
								</ul>
							</div>
						</td>
					@endif
					<td class="col-sm-2 highlightable">{{ $series->name }}</td>
					<td class="col-sm-1"><a href="http://www.imdb.com/title/{{ $series->video->imdb }}/" target="_blank">{{ $series->video->imdb }}</a></td>
					<td class="col-sm-1">{{ $series->video->release_year }}</td>
					<td class="col-sm-2">{{ $series->video->genre }}</td>
					<td class="col-sm-1">{{ $series->video->language->language }}</td>
					<td class="col-sm-1">{{ $series->video->quality->quality }}</td>
					<td class="col-sm-{{ Auth::check()?2:3 }} highlightable">{{ $series->description }}</td>
					<td class="col-sm-1">${{ number_format($series->price, 2) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	{{ $emptyMovieMsg or 'No series to show' }}
@endif