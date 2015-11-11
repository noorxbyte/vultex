<!-- pages/_video.blade.php -->

@if(sizeof($records) != 0)
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
			@foreach($records as $record)
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
					<td class="col-sm-2 highlightable">{{ $record->name }}</td>
					<td class="col-sm-1"><a id="imdb-{{ $record->id }}" href="http://www.imdb.com/title/{{ $record->video->imdb }}/" target="_blank" class="imdb">{{ $record->video->imdb }}</a></td>
					<td class="col-sm-1">{{ $record->video->release_year }}</td>
					<td class="col-sm-2">
						@foreach($record->genres as $key => $genre)
							@if($key == (count($record->genres) - 1))
								{{ $genre->name }}
							@else
								{{ $genre->name . ', ' }}
							@endif
						@endforeach
					</td>
					<td class="col-sm-1">{{ $record->video->language->name }}</td>
					<td class="col-sm-1">{{ $record->video->quality->name }}</td>
					<td class="col-sm-{{ Auth::check()?2:3 }}">{{ $record->description }}</td>
					<td class="col-sm-1">MVR {{ number_format($record->price, 2) }}</td>
				</tr>
				<tr>
					<td colspan="{{ Auth::check()?9:8 }}" class="text-center">
						<a id="imdb-{{ $record->id }}" href="http://www.imdb.com/title/{{ $record->video->imdb }}/" target="_blank">
							<img id="img-{{ $record->id }}" src="{{ $record->video->poster }}" alt="Poster Image" class="img-responsive img-thumbnail img-hidden poster" href="http://www.imdb.com/title/{{ $record->video->imdb }}/" target="_blank">
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	{{ $emptyrecordMsg or 'No records to show' }}
@endif