<?php

class AuthController extends BaseController {

    public function postLogin()
    {
        $params = array(
            'email' => Input::get('username'),
            'password' => Input::get('password')
        );
        if (Auth::attempt($params)) {
            return Redirect::route('home');
        } else {
            return Redirect::route('home')
                ->with('message', 'Wrong user name or password.');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::route('home');
    }

    public function postSignup()
    {
        // need Validator or some other checks
        $user = new User;
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();
        
        $profile = new Profile;
        $profile->location = 'syd';
        $profile->user()->associate($user);
        $profile->save();

        Auth::login($user); // automatically log in 
        return Redirect::route('home');
    }
}
