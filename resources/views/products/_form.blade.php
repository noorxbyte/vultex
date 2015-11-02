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

<div class="form-group">
    <label class="col-md-4 control-label" for="active">Active</label>
    <div class="col-md-4">
        {!! Form::checkbox('active', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Type</label>
    <div class="col-md-4">
        {!! Form::text('type', isset($type)?$type:null, ['class' => 'form-control', 'readonly']) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Title</label>
        <div class="col-md-4">
            {!! Form::text('name', null, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Movie/Series Title', 'onchange' => 'getIMDBByTitle()', 'required']) !!}
        </div>
</div>

@include('products.__' . $type)

<div class="form-group">
    <label class="col-md-4 control-label">Plot</label>
    <div class="col-md-4">
        {!! Form::textarea('description', null, ['id' => 'plot', 'class' => 'form-control', 'rows' => 5]) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Price</label>
    <div class="col-md-4">
        {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Price', 'required']) !!}
    </div>
</div>