<!-- platforms/create.blade.php -->

@extends('master')

@section('content')

	{!! Form::open(['action' => 'PlatformsController@store', 'class' => 'form-inline']) !!}
		@include('platforms._form', ['submitBtnText' => 'Add New'])
	{!! Form::close() !!}

@stop