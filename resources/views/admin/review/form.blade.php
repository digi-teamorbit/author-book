<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('email', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('review') ? 'has-error' : ''}}">
    {!! Form::label('review', 'Review', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::textarea('review', null, ('required' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('review', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center">
    <div class="col-lg-4 col-12 align-content-center">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
