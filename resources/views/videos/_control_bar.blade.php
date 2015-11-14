{!! Form::open(['action' => $action, 'method' => 'GET', 'class' => 'form-inline']) !!}
	<!-- sorting and filter forms -->
	<span class="pull-left">
		<div class="form-group">
			{!! Form::select('sort', ['v.updated_at' => 'Recently Added', 'v.release_year' => 'Year', 'price' => 'Price', 'name' => 'Title'], null, ['class' => 'form-control input-sm']) !!}
		</div>
		<div class="form-group">
			{!! Form::select('order', ['DESC' => 'Descending', 'ASC' => 'Ascending'], null, ['class' => 'form-control input-sm']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Sort', ['class' => 'btn btn-default btn-sm']) !!}
		</div>

		<div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>

		<div class="form-group">
			<label for="language">Language: </label>
			{!! Form::select('language', [null => '-- All --'] + $languages, null, ['class' => 'form-control input-sm']) !!}
		</div>

		<div class="form-group">&nbsp;&nbsp;&nbsp;</div>

		<div class="form-group">
			<label for="genre">Genres: </label>
			{!! Form::select('genre', [null => '-- All --'] + $genres, null, ['class' => 'form-control input-sm']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Filter', ['class' => 'btn btn-default btn-sm']) !!}
		</div>
	</span>

	<!-- search form -->
	<span class="pull-right">
		<div class="form-group">
			{!! Form::input('search', 'q', null, ['id' => 'search', 'class' => 'form-control input-sm', 'placeholder' => $searchPlaceHolder]) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Search', ['class' => 'btn btn-default btn-sm']) !!}
		</div>
	</span>
{!! Form::close() !!}