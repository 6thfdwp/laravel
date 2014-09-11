<?php
//namespace controllers;

class UserController extends BaseController {
    public function getProfile($userId) {
        // get user
        $u = User::find($userId);
        $user_profile = $u->profile;
        $data = [ 'first_name' => Auth::user()->first_name,
            'last_name'  => $u->last_name,
            'email'    => Auth::user()->email, 
            'location' => $user_profile->location,
            'photo_url'=> url('img/avatar/default-user-avatar.jpeg')
        ];
        //return View::make('user.profile', $data);
        return View::make('user.profile')->with('data', $data);
    }
}
