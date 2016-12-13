@extends('layouts.base')

@section('title')
    Maak nieuwe klas
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

                        {!! Form::open(['url' => '/school_groups', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('school_groups.form')

                        {!! Form::close() !!}

    </div>
@endsection