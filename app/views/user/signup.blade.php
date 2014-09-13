<div class="container">
	<div class="jumbotron">
<!-- 		<form method="POST" action="{{ route('auth.postSignup') }}" role="form">
		  <div class="form-group">
		  	<input type="text" class="form-control" name="first_name" placeholder="First Name">
		  	<input type="text" class="form-control" name="last_name" placeholder="Last Name">
		  </div>
		  <div class="form-group">
		    <input type="email" id="" class="form-control" name="email" placeholder="Enter email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" id="" class="form-control" name="password" placeholder="Password">
		    <input type="password" class="form-control" placeholder="Reenter Password">
		  </div>
		  <button type="submit" class="btn btn-lg btn-primary">Sign up</button>
		</form> -->
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