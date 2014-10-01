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

    	<!-- <div id="wrap"> -->
    		@yield('content')
    	<!-- </div> -->

    	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}
    	{{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}

        {{ HTML::script( asset('js/vendor/jquery.cookie.js') ) }}
    </body>
</html>