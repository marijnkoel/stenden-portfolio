<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('background_color') ? 'has-error' : ''}}">
    {!! Form::label('background_color', 'Background Color', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('background_color', null, ['class' => 'form-control']) !!}
        {!! $errors->first('background_color', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('headers_color') ? 'has-error' : ''}}">
    {!! Form::label('headers_color', 'Headers Color', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('headers_color', null, ['class' => 'form-control']) !!}
        {!! $errors->first('headers_color', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('text_color') ? 'has-error' : ''}}">
    {!! Form::label('text_color', 'Text Color', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('text_color', null, ['class' => 'form-control']) !!}
        {!! $errors->first('text_color', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>