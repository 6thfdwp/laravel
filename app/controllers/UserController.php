<?php
//namespace controllers;

class UserController extends BaseController {
    public function getProfile($userId) {
        // get user
        $u = User::find($userId);
        $user_profile = $u->profile;
        $avatar = $u->photo_url ? $u->photo_url : 'default-user-avatar.jpeg';
        $data = [ 'user_id' => $userId,
            'first_name' => Auth::user()->first_name,
            'last_name'  => $u->last_name,
            'email'    => Auth::user()->email, 
            'location' => $user_profile->location,
            'photo_url'=> url("img/avatar/$avatar")
        ];
        //return View::make('user.profile', $data);
        return View::make('user.profile')->with('data', $data);
    }

    public function postProfile() {
        $user_id = Input::get('user_id');
        $file = Input::file('avatar');
        // $filename = $file ? $file->getClientOriginalName()

        $u = User::find($user_id);
        $user_profile = $u->profile;
        $u->first_name = Input::get('first_name');
        $u->last_name = Input::get('last_name');
        if ( $file ) {
            $u->photo_url = $file->getClientOriginalName();
            $user_profile->photo_url = $file->getClientOriginalName();
            $to = public_path() . '/img/avatar';
            $file->move($to, $file->getClientOriginalName());
        }
        $user_profile->location = Input::get('location');

        $u->save();
        $user_profile->save();
        return Redirect::route('user.getProfile', $user_id)->withInput();
    }

}
