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
			<th>Price</th>
		</thead>
		<tbody>
			@foreach($records as $record)
				<tr>
					@if (Auth::check())
						<td>
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
					<td class="highlightable">{{ $record->name }}</td>
					<td><a id="imdb-{{ $record->id }}" href="http://www.imdb.com/title/{{ $record->video->imdb }}/" target="_blank" class="imdb">{{ $record->video->imdb }}</a></td>
					<td>{{ $record->video->release_year }}</td>
					<td>
						@foreach($record->genres as $key => $genre)
							@if($key == (count($record->genres) - 1))
								{{ $genre->name }}
							@else
								{{ $genre->name . ', ' }}
							@endif
						@endforeach
					</td>
					<td>{{ $record->video->language->name }}</td>
					<td>{{ $record->video->quality->name }}</td>
					<td>MVR {{ number_format($record->price, 2) }}</td>
				</tr>
				<tr>
					<td colspan="9">
						<div id="panel-{{ $record->id }}" class="poster">
							<span class="col-sm-3"></span>

							<a href="http://www.imdb.com/title/{{ $record->video->imdb }}/" target="_blank" class="col-sm-3">
								<img id="img-{{ $record->id }}" src="{{ $record->video->poster }}" alt="Poster Image" class="img-responsive img-thumbnail img-poster" href="http://www.imdb.com/title/{{ $record->video->imdb }}/" target="_blank">
							</a>

							<span class="col-sm-3 details">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">Plot</h4>
									</div>
									<div class="panel-body">{{ $record->description }}</div>
								</div>
							</span>

							<span class="col-sm-3"></span>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	{{ $emptyrecordMsg or 'No records to show' }}
@endif