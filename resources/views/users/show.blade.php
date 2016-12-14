@extends('layouts.base')

@section('title')
    {{$user->name}} {{$user->infix}} {{$user->surname}}
@endsection

@section('content')
    <div class="container">

        <h3> {{$user->name}} {{$user->infix}} {{$user->surname}} </h3>
                        <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit User"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['users', $user->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete User',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>

                                    <tr><th> Naam </th><td> {{ $user->name }} {{ $user->infix }} {{ $user->surname }}</td></tr>
                                    @if($user->user_level == 2)
                                    <tr><th> Klas </th><td><a href="{{ url('/school_group/'. $user->school_group->id . '/users') }}">{{ $user->school_group->name }} </a></td></tr>
                                    <tr><th> Portfolio </th><td> <a class="btn btn-default" href=" {{ url('portfolios/' . $user->portfolio->id) }} " role="button">Bekijk portfolio</a> </td></tr>
                                    @endif
                                    <tr><th> Rol </th><td> {{ user_levels()[$user->user_level] }} </td></tr>
                                </tbody>
                            </table>
                        </div>

    </div>
@endsection
