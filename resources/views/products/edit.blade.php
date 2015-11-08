<!-- products/edit.blade.php -->

@extends('master')

@section('content')

	{!! Form::model($product, ['action' => ['ProductsController@update', $product->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
		@include('products._form', ['submitBtnText' => 'Update', 'subFrm' => $type, 'product' => $product])
	{!! Form::close() !!}

@stop