<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::email('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('password', ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('roles') ? 'has-error' : ''}}" id="role">
    {!! Form::label('roles', 'Roles', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('roles[]', Spatie\Permission\Models\Role::get()->pluck('name','name'), isset($user)?$user->getRoleNames():null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('roles', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

@section('script')
    <script type="text/javascript">
        var permission = {
            deo: {
                show: [],
                hide: []
            },
            ah: {
                show: ['thana'],
                hide: ['school']
            },
            hm: {
                show: ['thana', 'school'],
                hide: []
            }
        };
        $('#role').select(function () {
            var role = $('#role :selected').text();
            alert(role);
            if (permission.hasOwnProperty(role)) {
                var tobeShown = permission[role].show;
                var tobeHiden = permission[role].hide;

                for(var i = 0; i < tobeShown.length; i++){
                    var id = tobeShown[i];
                    $('#' + id).style.display = 'block';
                }

                for(var i = 0; i < tobeHiden.length; i++){
                    var id = tobeHiden[i];
                    $('#' + id).style.display = 'none';
                }
            }
        });
    </script>
@endsection