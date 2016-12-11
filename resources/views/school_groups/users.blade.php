@extends('layouts.base')

@section('title')
    Klas {{$school_group->name}}
@endsection

@section('content')
<div class="container">
	<h3> Studenten <a href="{{ url('school_groups/' . $school_group->id . '/edit') }}" class="btn btn-default pull-right" >Klas bewerken</a></h3>
	@if(count($users) < 1)
		<div class="alert alert-warning">
			Er zitten nog geen studenten in deze klas!
		</div>
	@endif
	<div class="user-list">
		@foreach($users as $user)
			<a href="{{ url('users/' . $user->id ) }}"> {{$user->name}} {{$user->infix}} {{$user->surname}} </a>
		@endforeach
	</div>
</div>
@endsection