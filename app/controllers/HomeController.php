<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

    public function getIndex()
    {
    	if (Auth::check()) {
	        return View::make('home.index');
    	}
    	else {
    		return View::make('user.signup');
    	}
    }

    public function getChat()
    {
        $me = array('id' => Auth::user()->id,
            'first_name' => Auth::user()->first_name,
            'email' => Auth::user()->email);
        return View::make('home.chat')->with('me', $me);
        //return View::composer('home.chat', function($view) {
            //$view->with('Me', Auth::user());
        //});
    }

}
