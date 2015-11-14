<!-- platforms/edit.blade.php -->

@extends('master')

@section('content')

	{!! Form::model($platform, ['action' => ['PlatformsController@update', $platform->id], 'method' => 'PUT', 'class' => 'form-inline']) !!}
		@include('platforms._form', ['submitBtnText' => 'Edit'])
	{!! Form::close() !!}

@stop