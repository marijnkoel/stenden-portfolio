@extends('layouts.base')

@section('title')
    Nieuwe gebruiker
@endsection

@section('content')
<div class="container">
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['url' => '/users', 'class' => 'form-horizontal', 'files' => true]) !!}

    @include ('users.form')

    {!! Form::close() !!}
</div>
@endsection


@section('script')
    <script> 
        $(window).load(function() {
            if ($('#user_level').val() != 2) {
                $('#school_group_id_form_group').hide();
            } else {
                $('#school_group_id_form_group').show();
            }
        });
        
        $('#user_level').change(function(event) {
            if ($(this).val() != 2) {
                $('#school_group_id_form_group').hide();
            } else {
                $('#school_group_id_form_group').show();
            }
        });
    </script>
@endsection