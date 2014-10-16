<?php

Event::listen('auth.login', function($user) {
	$redis = Redis::connection();
	// $redis->set('u'.$user->id, $user->email);
    $u = array('id' => $user->id, 'first_name' => $user->first_name,
            'last_name' => $user->last_name, 'email' => $user->email);
	$redis->publish('auth.login', json_encode($u));
});
