<!-- languages/create.blade.php -->

@extends('master')

@section('content')

	{!! Form::open(['action' => 'LanguagesController@store', 'class' => 'form-inline']) !!}
		@include('languages._form', ['submitBtnText' => 'Add New'])
	{!! Form::close() !!}

@stop