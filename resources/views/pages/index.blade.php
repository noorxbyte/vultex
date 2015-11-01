<!-- pages/index.blade.php -->

@extends('master')

@section('content')
	<div class="row">
		<!-- sorting and filter forms -->
		<span class="pull-left">
			{!! Form::open(['action' => 'PagesController@index', 'method' => 'GET', 'class' => 'form-inline']) !!}
				<div class="form-group">
					{!! Form::text('q', null, ['class' => 'form-control', 'placeholder' => 'Search Our Database']) !!}
				</div>
				<div class="form-group">
					{!! Form::button('Search', ['class' => 'btn btn-default']) !!}
				</div>
			{!! Form::close() !!}
		</span>

		<!-- search form -->
		<span class="pull-right">
			{!! Form::open(['action' => 'PagesController@index', 'method' => 'GET', 'class' => 'form-inline']) !!}
				<div class="form-group">
					{!! Form::input('search', 'q', null, ['class' => 'form-control', 'placeholder' => 'Search Our Database']) !!}
				</div>
				<div class="form-group">
					{!! Form::button('Search', ['class' => 'btn btn-default']) !!}
				</div>
			{!! Form::close() !!}
		</span>

	</div>
@stop