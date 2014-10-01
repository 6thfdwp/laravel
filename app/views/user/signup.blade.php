@extends('layouts.main')

@section('content')
<div class="container">
	<div class="jumbotron">
		{{ Form::open(['route' => 'auth.postSignup']) }}
			<div class="form-group">
				{{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) }}
				{{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) }}
			</div>
			<div class="form-group">
				{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email']) }}
			</div>
			<div class="form-group">
				{{-- Form::label('password', 'Password', ['class'=>'control-label']) --}}
				{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
			</div>
			<button type="submit" class="btn btn-primary btn-login">Sign up</button>
		{{ Form::close() }}
	</div>
</div>
@stop