<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Naam', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('slb') ? 'has-error' : ''}}">
    {!! Form::label('slb', 'SLB opracht', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
                    <div class="checkbox">
                <label>{!! Form::radio('slb', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('slb', '0', true) !!} No</label>
            </div>
        {!! $errors->first('slb', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    {!! Form::label('type', 'Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
         {{
            Form::select(
                'type',
                $module_types,
                null,
                ['class' => 'form-control'])
            
         }}
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{-- <div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    {!! Form::label('type', 'Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('type', null, ['class' => 'form-control']) !!}
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
{{-- <div class="form-group {{ $errors->has('approved') ? 'has-error' : ''}}">
    {!! Form::label('approved', 'Approved', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
                    <div class="checkbox">
                <label>{!! Form::radio('approved', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('approved', '0', true) !!} No</label>
            </div>
        {!! $errors->first('approved', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Titel', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div id="description_form_group" class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Omschrijving', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div id="path_form_group" class="form-group {{ $errors->has('bestand') ? 'has-error' : ''}}">
    {!! Form::label('bestand', 'Bestand', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{-- {!! Form::text('path', null, ['class' => 'form-control']) !!} --}}
        {!! Form::file('bestand', null, ['class' => 'form-control']) !!}
        {!! $errors->first('bestand', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div id="url_form_group" class="form-group {{ $errors->has('url') ? 'has-error' : ''}}">
    {!! Form::label('url', 'URL', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('url', null, ['class' => 'form-control']) !!}
        {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

{{csrf_field()}}