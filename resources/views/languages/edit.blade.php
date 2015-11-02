<!-- languages/edit.blade.php -->

@extends('master')

@section('content')

	{!! Form::model($language, ['action' => ['LanguagesController@update', $language->id], 'method' => 'PUT', 'class' => 'form-inline']) !!}
		@include('languages._form', ['submitBtnText' => 'Edit'])
	{!! Form::close() !!}

@stop