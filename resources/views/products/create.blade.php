<!-- products/create.blade.php -->

@extends('master')

@section('content')

	{!! Form::open(['action' => 'ProductsController@store', 'class' => 'form-horizontal']) !!}
		<fieldset>
			@include('products._form', ['submitBtnText' => 'Add New', 'subFrm' => $type])
		</fieldset>
	{!! Form::close() !!}

@stop