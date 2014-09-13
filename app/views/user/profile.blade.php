@extends('layouts.main')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-md-2">
				<img src="{{ $data['photo_url'] }}">
			</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
			{{ Form::open(['route' => 'user.postProfile', 'files' => true]) }}
				<input type="hidden" name="user_id" value= {{ $data['user_id'] }}>
				<div class="form-group">
					{{ Form::text('first_name', $data['first_name'], ['class' => 'form-control', 'placeholder' => 'First Name']) }}
					{{ Form::text('last_name', $data['last_name'], ['class' => 'form-control', 'placeholder' => 'Last Name']) }}
				</div>
				<div class="form-group">
					{{ Form::text('email', $data['email'], ['class' => 'form-control', 'placeholder' => 'Enter email']) }}
				</div>
				<div class="form-group">
					{{ Form::text('location', $data['location'], ['class' => 'form-control', 'placeholder' => '']) }}
				</div>
				<div class="form-group">
					{{ Form::label('file', 'Avatar', ['id'=>'','class'=>'']) }}
					{{ Form::file('avatar', '', ['id'=>'','class'=>'']) }}
				</div>
		
				<button type="submit" class="btn btn-primary btn-login">Update</button>
			{{ Form::close() }}
			</div>
		</div>
	</div>
@stop

