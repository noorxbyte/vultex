<!-- qualities/edit.blade.php -->

@extends('master')

@section('content')

	{!! Form::model($quality, ['action' => ['QualitiesController@update', $quality->id], 'method' => 'PUT', 'class' => 'form-inline']) !!}
		@include('qualities._form', ['submitBtnText' => 'Edit'])
	{!! Form::close() !!}

@stop