{!! Form::open(['action' => $action, 'method' => 'GET', 'class' => 'form-inline']) !!}
	<!-- sorting and filter forms -->
	<span class="pull-left">
		<div class="form-group">
			{!! Form::select('sort', ['v.release_year' => 'Year', 'price' => 'Price', 'name' => 'Title'], null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::select('order', ['DESC' => 'Descending', 'ASC' => 'Ascending'], null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Sort', ['class' => 'btn btn-default']) !!}
		</div>
	</span>

	<!-- search form -->
	<span class="pull-right">
		<div class="form-group">
			{!! Form::input('search', 'q', null, ['id' => 'search', 'class' => 'form-control', 'placeholder' => $searchPlaceHolder]) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Search', ['class' => 'btn btn-default']) !!}
		</div>
	</span>
{!! Form::close() !!}