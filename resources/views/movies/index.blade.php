<!-- series/index.blade.php -->

@extends('master')

@section('content')

	<!-- main navbar -->
	<div class="row">
		@include('videos._control_bar', ['action' => 'MoviesController@index', 'searchPlaceHolder' => 'Search Movies'])
	</div><hr>

	<!-- data container -->
	<div class="data">

		<!-- display movie list -->
		@include('_video', ['records' => $movies])

	</div>
@stop