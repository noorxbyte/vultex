<!-- products/__game.blade.php -->

<div class="form-group">
    <label class="col-md-4 control-label">Poster</label>
        <div class="col-md-4">
            {!! Form::text(isset($product)?'game[poster]':'poster', null, ['id' => 'poster', 'class' => 'form-control', 'placeholder' => 'Poster URL']) !!}
        </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Release Date</label>
        <div class="col-md-4">
            {!! Form::text(isset($product)?'game[release_date]':'release_date', null, ['id' => 'dpicker', 'class' => 'form-control', 'placeholder' => 'Release Date']) !!}
        </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Platforms</label>
        <div class="col-md-4">
            {!! Form::select(isset($product)?'game[platform_id]':'platform_id', $platforms, null, ['class' => 'form-control']) !!}
        </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Genre</label>
        <div class="col-md-4">
            {!! Form::text(isset($product)?'game[genre]':'genre', null, ['id' => 'genre', 'class' => 'form-control', 'placeholder' => 'Genre']) !!}
        </div>
</div>