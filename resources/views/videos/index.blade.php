<!-- videos/index.blade.php -->

@extends('master')

@section('content')

	<!-- main navbar -->
	<div class="row">
		@include('videos._control_bar', ['action' => 'VideosController@index', 'searchPlaceHolder' => 'Search Documentries'])
	</div><hr>

	<!-- data container -->
	<div class="data">

		<!-- display movie list -->
		@include('_video', ['records' => $videos])

	</div>
@stop