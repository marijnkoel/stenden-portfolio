<div class="form-group {{ $errors->has('portfolio_id') ? 'has-error' : ''}}">
    {!! Form::label('portfolio_id', 'Portfolio Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('portfolio_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('portfolio_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('module_id') ? 'has-error' : ''}}">
    {!! Form::label('module_id', 'Module Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('module_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('module_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>