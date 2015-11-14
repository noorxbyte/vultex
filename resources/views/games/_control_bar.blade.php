{!! Form::open(['action' => $action, 'method' => 'GET', 'class' => 'form-inline']) !!}
	<!-- sorting and filter forms -->
	<span class="pull-left">
		<div class="form-group">
			{!! Form::select('sort', ['g.updated_at' => 'Recently Added', 'g.release_date' => 'Year', 'price' => 'Price', 'name' => 'Title'], null, ['class' => 'form-control input-sm']) !!}
		</div>
		<div class="form-group">
			{!! Form::select('order', ['DESC' => 'Descending', 'ASC' => 'Ascending'], null, ['class' => 'form-control input-sm']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Sort', ['class' => 'btn btn-default btn-sm']) !!}
		</div>

		<div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>

		<div class="form-group">
			<label for="language">Platform: </label>
			{!! Form::select('language', [null => '-- All --'] + $platforms, null, ['class' => 'form-control input-sm']) !!}
		</div>

		<div class="form-group">&nbsp;&nbsp;&nbsp;</div>

		<div class="form-group">
			<label for="genre">Genres: </label>
			{!! Form::select('genre', [null => '-- All --'] + $genres, null, ['class' => 'form-control input-sm', 'title' => 'Coming soon', 'disabled']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Filter', ['class' => 'btn btn-default btn-sm']) !!}
		</div>
	</span>

	<!-- search form -->
	<span class="pull-right">
		<div class="form-group">
			{!! Form::input('search', 'q', null, ['id' => 'search', 'class' => 'form-control input-sm', 'placeholder' => 'Search Games']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Search', ['class' => 'btn btn-default btn-sm']) !!}
		</div>
	</span>
{!! Form::close() !!}