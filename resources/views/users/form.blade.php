<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Naam', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('infix') ? 'has-error' : ''}}">
    {!! Form::label('infix', 'Tussenvoegsel', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('infix', null, ['class' => 'form-control']) !!}
        {!! $errors->first('infix', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
    {!! Form::label('surname', 'Achternaam', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('surname', null, ['class' => 'form-control']) !!}
        {!! $errors->first('surname', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('user_level') ? 'has-error' : ''}}">
    {!! Form::label('user_level', 'Rol', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
         {{
            Form::select(
                'user_level',
                $user_levels,
                null,
                ['class' => 'form-control'])
            
         }}
        {!! $errors->first('user_level', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('school_group_id') ? 'has-error' : ''}}">
    {!! Form::label('school_group_id', 'Klas', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
         @if( count($school_groups) == 0 )
            Er bestaan nog geen klassen! Maak er eerst wat aan.
         @else
         {{
            Form::select(
                'school_group_id',
                $school_groups,
                null,
                ['class' => 'form-control'])
            
         }}
         @endif
        {!! $errors->first('school_group_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Wachtwoord', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('password', null, ['class' => 'form-control']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Aanmaken', ['class' => 'btn btn-primary']) !!}
    </div>
</div>