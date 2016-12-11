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