<div class="form-group {{ $errors->has('district') ? 'has-error' : ''}}">
    {!! Form::label('district', 'District', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('district', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('district', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('thana') ? 'has-error' : ''}}">
    {!! Form::label('thana', 'Thana', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('thana', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('thana', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ah') ? 'has-error' : ''}}">
    {!! Form::label('ah', 'Area Head', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('ah', $ah, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('ah', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
