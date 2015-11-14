<!-- videos/index.blade.php -->

@extends('master')

@section('content')

	<!-- main navbar -->
	<div class="row">
		@include('videos._control_bar', ['action' => ['VideosController@index', $type], 'searchPlaceHolder' => "Search $title"])
	</div><hr>

	<!-- data container -->
	<div class="data">

		<!-- display movie list -->
		@include('videos._video', ['records' => $videos])

	</div>
@stop