@extends('layouts.base')

@section('title')
    Nieuwe module
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Module</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/modules', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('modules.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
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