<!-- qualities/create.blade.php -->

@extends('master')

@section('content')

	{!! Form::open(['action' => 'QualitiesController@store', 'class' => 'form-inline']) !!}
		@include('qualities._form', ['submitBtnText' => 'Add New'])
	{!! Form::close() !!}

@stop