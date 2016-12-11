@extends('layouts.base')

@section('title')
    Klas {{$school_group->name}}
@endsection

@section('content')
<div class="container">
	<h3> Studenten </h3>
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