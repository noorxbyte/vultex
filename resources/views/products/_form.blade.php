<!-- products/_form.blade.php -->

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::input('hidden', 'type', isset($type)?strtoupper($type):null) !!}

<div class="form-group">
    <label class="col-md-4 control-label">{{ $name or 'Product Name' }}</label>
        <div class="col-md-4">
            {!! Form::text('name', null, ['id' => ($type == 'movie' || $type == 'series')?'title':'name', 'class' => 'form-control', 'placeholder' => isset($namePlaceHolder)?$namePlaceHolder:'Product Name', 'onchange' => 'getIMDBByTitle()', 'required', 'autofocus']) !!}
        </div>
</div>

@include("products.__$type")

<div class="form-group">
    <label class="col-md-4 control-label">{{ $description or 'Description' }}</label>
    <div class="col-md-4">
        {!! Form::textarea('description', null, ['id' => ($type == 'movie' || $type == 'series')?'plot':'description', 'class' => 'form-control', 'rows' => 5]) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Price</label>
    <div class="col-md-4">
        {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Price', 'step' => 0.01, 'min' => 0, 'required']) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label"></label>
    <div class="col-md-4">
        <span class="pull-left">{!! Form::submit($submitBtnText, ['class' => 'btn btn-default']) !!}</span>
        <span class="pull-right">
            {!! Form::select('active', [1 => 'Active', 0 => 'Obselete'], null, ['class' => 'form-control']) !!}
        </span>
    </div>
</div>