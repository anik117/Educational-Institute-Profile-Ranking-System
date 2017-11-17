<div class="form-group {{ $errors->has('class') ? 'has-error' : ''}}">
    {!! Form::label('class', 'Class', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('class', json_decode('{"one": "One", "two":"Two", "three":"Three", "four": "Four", "five":"Five", "six":"Six", "seven": "Seven", "eight":"Eight", "nine":"Nine", "ten":"Ten"}', true), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('class', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('pass') ? 'has-error' : ''}}">
    {!! Form::label('pass', 'Pass', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('pass', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('pass', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('attendance') ? 'has-error' : ''}}">
    {!! Form::label('attendance', 'Attendance', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('attendance', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('attendance', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('students') ? 'has-error' : ''}}">
    {!! Form::label('students', 'Students', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('students', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('students', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{-- <div class="form-group {{ $errors->has('teachers') ? 'has-error' : ''}}">
    {!! Form::label('teachers', 'Teachers', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('teachers', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('teachers', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
<div class="form-group {{ $errors->has('fee') ? 'has-error' : ''}}">
    {!! Form::label('fee', 'Fee', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('fee', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('fee', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
