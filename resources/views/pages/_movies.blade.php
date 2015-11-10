<!-- pages/_movies.blade.php -->

@if(sizeof($movies) != 0)
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
			<th>Price</th>
		</thead>
		<tbody>
			@foreach($movies as $movie)
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
					<td class="col-sm-2 highlightable">{{ $movie->name }}</td>
					<td class="col-sm-1"><a href="http://www.imdb.com/title/{{ $movie->video->imdb }}/" target="_blank">{{ $movie->video->imdb }}</a></td>
					<td class="col-sm-1">{{ $movie->video->release_year }}</td>
					<td class="col-sm-2">{{ $movie->video->genre }}</td>
					<td class="col-sm-1">{{ $movie->video->language->language }}</td>
					<td class="col-sm-1">{{ $movie->video->quality->quality }}</td>
					<td class="col-sm-{{ Auth::check()?2:3 }}">{{ $movie->description }}</td>
					<td class="col-sm-1">MVR {{ number_format($movie->price, 2) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	{{ $emptyMovieMsg or 'No movies to show' }}
@endif