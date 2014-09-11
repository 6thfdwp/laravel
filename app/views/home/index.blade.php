@extends('layouts.main')

@section('content')
	@if(Auth::check())
	  <div class="jumbotron">
	  	<h2>Welcome, {{ Auth::user()->first_name }} 
	  		{{ Auth::user()->last_name }}</h2>
	  </div>
	@else
	  @include('user/signup')
	@endif
@stop