<!-- anime/index.blade.php -->

@extends('master')

@section('content')

	<!-- main navbar -->
	<div class="row">
		@include('videos._control_bar', ['action' => 'AnimeController@index', 'searchPlaceHolder' => 'Search Anime'])
	</div><hr>

	<!-- data container -->
	<div class="data">

		<!-- display movie list -->
		@include('_video', ['records' => $anime])

	</div>
@stop