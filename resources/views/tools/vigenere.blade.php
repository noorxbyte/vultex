<!-- tools/vigenere.blade.php -->

@extends('master')

@section('content')

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	
	{!! Form::open(['action' => 'PagesController@vigenereAction', 'id' => 'vigenere_form']) !!}
		<div class="form-group">
			{!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Password', 'autocomplete' => 'off', 'required']) !!}
		</div>
		<div class="form-group">
			<textarea spellcheck="false" name="box" class="form-control" rows="10">{{ $code or old('box') }}</textarea>
		</div>
		<div class="form-group">
			{!! Form::submit('Encrypt', ['name' => 'encrypt', 'class' => 'btn btn-default', 'style' => 'width:100%']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Decrypt', ['name' => 'decrypt', 'class' => 'btn btn-default', 'style' => 'width:100%']) !!}
		</div>
	{!! Form::close() !!}

@stop