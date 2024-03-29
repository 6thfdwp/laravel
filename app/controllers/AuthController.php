<?php

use Klap\Repositories\UserRepoInterface;

class AuthController extends BaseController {

    protected $userRepo;

    public function __construct(UserRepoInterface $urepo)
    {
        parent::__construct();
        $this->userRepo = $urepo;
    }

    public function postLogin()
    {
        $params = array(
            'email' => Input::get('username'),
            'password' => Input::get('password')
        );
        if (Auth::attempt($params)) {
            $user = Auth::user();
            Event::fire('auth.login', $user);
            // Session::put($userid, Input::get('username'));
            return Redirect::route('chat');
            //return Redirect::route('home');
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
        //$user = new User;
        //$user->first_name = Input::get('first_name');
        //$user->last_name = Input::get('last_name');
        //$user->email = Input::get('email');
        //$user->password = Hash::make(Input::get('password'));
        //$user->save();
        
        //$profile = new Profile;
        //$profile->location = 'syd';
        //$profile->user()->associate($user);
        //$profile->save();

        $user = $userRepo->create(Input::all());
        Auth::login($user); // automatically log in 
        return Redirect::route('home');
    }
}
