<!-- products/__movse.blade.php -->

<div class="form-group">
    <label class="col-md-4 control-label">IMDB ID</label>
        <div class="col-md-4">
            {!! Form::text(isset($product)?'movie[imdb]':'imdb', null, ['id' => 'imdb', 'class' => 'form-control', 'placeholder' => 'IMDB ID', 'onchange' => 'getIMDBByID()', 'required']) !!}
            <span class="small"><a href="#" target="_blank" id="check">Check</a></span>
        </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Year</label>
        <div class="col-md-4">
            {!! Form::number(isset($product)?'movie[release_year]':'release_year', null, ['id' => 'release_year', 'class' => 'form-control', 'placeholder' => 'Release Year', 'required']) !!}
        </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Language</label>
        <div class="col-md-4">
            {!! Form::select(isset($product)?'movie[language_id]':'language_id', $languages, null, ['class' => 'form-control']) !!}
        </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Quality</label>
        <div class="col-md-4">
            {!! Form::select(isset($product)?'movie[quality_id]':'quality_id', ['0' => '-- Quality --'] + $qualities, null, ['class' => 'form-control']) !!}
        </div>
</div>