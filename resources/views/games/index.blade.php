<!-- games/index.blade.php -->

@extends('master')

@section('content')

	<!-- main navbar -->
	<div class="row">
		@include('games._control_bar', ['action' => 'GamesController@index'])
	</div><hr>

	<!-- data container -->
	<div class="data">

		<!-- display game list -->
		@include('games._game', ['records' => $games])

	</div>
@stop