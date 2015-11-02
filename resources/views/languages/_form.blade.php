<!-- languages/_form.blade.php -->

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="text-center">
	<div class="form-group">
		{!! Form::text('language', null, ['class' => 'form-control', 'placeholder' => 'Language', 'required']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit($submitBtnText, ['class' => 'btn btn-primary']) !!}
	</div>
</div>