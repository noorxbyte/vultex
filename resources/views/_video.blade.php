<!-- pages/_video.blade.php -->

@if(sizeof($records) != 0)
	<table class="table table-striped sortable">
		<thead>
			@if (Auth::check())
				<th>Actions</th>
			@endif
			<th>Poster</th>
			<th>Title/Plot</th>
			<th>Year</th>
			<th>Genre</th>
			<th>Language</th>
			<th>Quality</th>
			<th>Price</th>
		</thead>
		<tbody>
			@foreach($records as $record)
				@if(count($record->video))
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
						<td  class="{{ Auth::check()?'col-sm-2':'col-sm-3' }}">
							<a href="http://www.imdb.com/title/{{ $record->video->imdb }}/" target="_blank">
								<img src="{{ file_exists(public_path() . $record->video->poster)?$record->video->poster:'/img/null.jpg' }}" alt="Poster Image" class="img-responsive img-thumbnail img-poster" href="http://www.imdb.com/title/{{ $record->video->imdb }}/" target="_blank">
							</a>
						</td>
						<td class="col-sm-3">
							<b class="video-title highlightable">{{ $record->name }}</b><hr style="margin:5px">
							{{ $record->description }}
						</td>
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
						<td class="col-sm-1">MVR {{ number_format($record->price, 2) }}</td>
					</tr>
				@else
					{{ dd($record) }}
				@endif
			@endforeach
		</tbody>
	</table><hr>

	<div class="text-center">{!! $records->appends(['q' => old('q'), 'sort' => old('sort'), 'order' => old('order'), 'language' => old('language')])->render() !!}</div>
@else
	{{ $emptyrecordMsg or 'No records to show' }}
@endif