<!-- products/__movse.blade.php -->

<div class="form-group">
    <label class="col-md-4 control-label">IMDB ID</label>
        <div class="col-md-4">
            {!! Form::text(isset($product)?'video[imdb]':'imdb', null, ['id' => 'imdb', 'class' => 'form-control', 'placeholder' => 'IMDB ID', 'onchange' => 'getIMDBByID()', 'required']) !!}
            <span class="small"><a href="#" target="_blank" id="check">Check</a></span>
        </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Year</label>
        <div class="col-md-4">
            {!! Form::text(isset($product)?'video[release_year]':'release_year', null, ['id' => 'release_year', 'class' => 'form-control', 'placeholder' => 'Release Year', 'required']) !!}
        </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Genre</label>
        <div class="col-md-4">
            {!! Form::text(isset($product)?'video[genre]':'genre', null, ['id' => 'genre', 'class' => 'form-control', 'placeholder' => 'Genre', 'required']) !!}
        </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Language</label>
        <div class="col-md-4">
            {!! Form::select(isset($product)?'video[language_id]':'language_id', $languages, null, ['class' => 'form-control']) !!}
        </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Quality</label>
        <div class="col-md-4">
            {!! Form::select(isset($product)?'video[quality_id]':'quality_id', ['0' => '-- Quality --'] + $qualities, null, ['class' => 'form-control']) !!}
        </div>
</div>