<?php

namespace Klap\Repositories\Eloquent;

use Klap\Repositories\UserRepoInterface;
//use Illuminate\Database\Eloquent\Model;

use User;
use Profile;

class UserRepo implements UserRepoInterface
{
    protected $user;

    protected $profile;

    public function __construct(User $user, Profile $profile)
    {
        $this->user = $user;
        $this->profile = $profile;
    }

    public function getById($userId)
    {
        //$u = User::find($userId);
        //return $u;
        return $this->user->find($userId);
    }

    /**
     * Get the user related profile by unique id.
     *
     * @param  int  $userId
     * @return array
     */
    public function getUserProfile($userId)
    {
        $u = $this->getById($userId);
        $user_profile = $u->profile;
        $avatar = $u->photo_url ? $u->photo_url : 'default-user-avatar.jpeg';
        $uprofile = [ 'user_id' => $userId,
            'first_name' => $u->first_name,
            'last_name'  => $u->last_name,
            'email'    => $u->email, 
            'location' => $user_profile->location,
            'photo_url'=> url("img/avatar/$avatar")
        ];        
        return $uprofile;
    }

    public function create(array $data)
    {
        $user = new User;
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        $profile = new Profile;
        $profile->location = 'syd';
        $profile->user()->associate($user);
        $profile->save();
        return $user;
    }
} 
