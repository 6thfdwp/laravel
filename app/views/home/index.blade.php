<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

		{{ HTML::style( asset('css/main.css') ) }}

    	<!-- Bootstrap core CSS -->
    	{{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
    </head>
    <body>
    	@include('partials/header')

    	<div class="jumbotron">
    		<h2>Welcome, {{ Auth::user()->first_name }} 
    			{{ Auth::user()->last_name }}</h2>
    	</div>

    	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}
    	{{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}
        {{ HTML::script( asset('js/vendor/jquery.cookie.js') ) }}

        {{-- HTML::script( asset('js/socket.io-client/socket.io.js') ) --}}
        {{-- HTML::script( asset('js/chat.main.js') ) --}}
    </body>
</html>