@extends('layouts.base')

@section('title')
    Module {{$module->name}} bewerken
@endsection

@section('content')
    <div class="container">

                    <h3>Edit Module {{ $module->id }}</h3>


                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($module, [
                            'method' => 'PATCH',
                            'url' => ['/modules', $module->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('modules.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}


    </div>
@endsection

@section('script')
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<script>
    $(window).load(function() {
        if ($('#type').val() == 0) {
            // Text    
            $('#path_form_group').hide();
            $('#description_form_group').show();
            $('#url_form_group').hide();

            $('#description_form_group').show();
        } else if($('#type').val() == 1 || $('#type').val() == 2 || $('#type').val() == 3){
            // Bestand, Afbeelding of video
            $('#description_form_group').hide();
            $('#url_form_group').hide();

            $('#path_form_group').show();
        } else {
            $('#description_form_group').show();
            $('#path_form_group').show();
            $('#url_form_group').show();
        }
    });

    $('#type').change(function(event) {
        if ($(this).val() == 0) {
            // Text    
            $('#path_form_group').hide();
            $('#url_form_group').hide();

            $('#description_form_group').show();
        } else if($(this).val() == 1 || $(this).val() == 2 || $(this).val() == 3){
            // Bestand, Afbeelding of video
            $('#description_form_group').hide();
            $('#url_form_group').hide();

            $('#path_form_group').show();
        } else {
            $('#description_form_group').show();
            $('#path_form_group').show();
            $('#url_form_group').show();
        }
    });
</script>
@endsection