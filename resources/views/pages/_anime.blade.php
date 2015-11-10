<!-- pages/_anime.blade.php -->

@if(sizeof($anime) != 0)
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
			@foreach($anime as $anime)
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
					<td class="col-sm-2 highlightable">{{ $anime->name }}</td>
					<td class="col-sm-1"><a href="http://www.imdb.com/title/{{ $anime->video->imdb }}/" target="_blank">{{ $anime->video->imdb }}</a></td>
					<td class="col-sm-1">{{ $anime->video->release_year }}</td>
					<td class="col-sm-2">{{ $anime->video->genre }}</td>
					<td class="col-sm-1">{{ $anime->video->language->language }}</td>
					<td class="col-sm-1">{{ $anime->video->quality->quality }}</td>
					<td class="col-sm-{{ Auth::check()?2:3 }} highlightable">{{ $anime->description }}</td>
					<td class="col-sm-1">${{ number_format($anime->price, 2) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	{{ $emptyMovieMsg or 'No anime to show' }}
@endif