@extends('layouts.base')

@section('title')
    Gebruikers
@endsection

@section('content')
<div class="container">
    <h3> Klassen 
    <div class="btn-group pull-right">
        <a class="btn btn-default" href="{{ url('users/create') }}" role="button">Nieuwe Gebruiker</a>
        <a class="btn btn-default" href="{{ url('school_groups/create') }}" role="button">Nieuwe klas</a>
    </div>
    </h3>
    @if(count($school_groups ) < 1)
        <div class="alert alert-info">
            Er bestaan nog geen klassen!
        </div>
    @endif

    <div class="user-list">
        {{-- Laat alle klassen zien --}}
        @foreach($school_groups as $school_group)
            <div class="btn-group">
                <a class="btn btn-default" href="{{ url('school_groups/' . $school_group->id . '/users') }}" role="button">{{$school_group->name}} </a>
                @if(Auth::user()->user_level < 2)
                    <a class="btn btn-default" href="{{ url('school_groups/' . $school_group->id )}}" role="button"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                @endif
            </div>
        @endforeach
    </div>

    <h3> Docenten en SLB'ers </h3>
    <div class="user-list">
        {{-- Laat alle docenten en SLB'ers zien --}}
        @foreach($users as $user)
           <a href="{{ url('users/' . $user->id) }}"> {{$user->name}} {{$user->infix}} {{$user->surname}} </a>
        @endforeach
    </div>
</div>
@endsection