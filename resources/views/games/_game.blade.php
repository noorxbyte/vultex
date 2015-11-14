<!-- games/_game.blade.php -->

@if(sizeof($records) != 0)
	<table class="table table-striped sortable">
		<thead>
			@if (Auth::check())
				<th>Actions</th>
			@endif
			<th>Poster</th>
			<th>Title/Description</th>
			<th>Year</th>
			<th>Genre</th>
			<th>Platform</th>
			<th>Price</th>
		</thead>
		<tbody>
			@foreach($records as $record)
				@if(count($record->game))
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
							<img src="{{ (is_file(public_path() . $record->game->poster))?$record->game->poster:'/img/null.jpg' }}" alt="Poster Image" class="img-responsive img-thumbnail img-poster">
						</td>
						<td class="col-sm-3">
							<b class="video-title highlightable">{{ $record->name }}</b><hr style="margin:5px">
							{{ $record->description }}
						</td>
						<td class="col-sm-1">{{ date('Y', strtotime($record->game->release_date)) }}</td>
						<td class="col-sm-2">
							@foreach($record->genres as $key => $genre)
								@if($key == (count($record->genres) - 1))
									{{ $genre->name }}
								@else
									{{ $genre->name . ', ' }}
								@endif
							@endforeach
						</td>
						<td class="col-sm-1">{{ $record->game->platform->name }}</td>
						<td class="col-sm-1">MVR {{ number_format($record->price, 2) }}</td>
					</tr>
				@else
					{{ dd($record) }}
				@endif
			@endforeach
		</tbody>
	</table><hr>

	<div class="text-center">{!! $records->appends(['q' => old('q'), 'sort' => old('sort'), 'order' => old('order'), 'platform' => old('platform')])->render() !!}</div>
@else
	{{ $emptyrecordMsg or 'No records to show' }}
@endif