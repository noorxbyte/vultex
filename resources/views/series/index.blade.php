<!-- series/index.blade.php -->

@extends('master')

@section('content')

	<!-- main navbar -->
	<div class="row">
		@include('videos._control_bar', ['action' => 'SeriesController@index', 'searchPlaceHolder' => 'Search Series'])
	</div><hr>

	<!-- data container -->
	<div class="data">

		<!-- display movie list -->
		@include('_video', ['records' => $series])

	</div>
@stop