<?php

Event::listen('auth.login', function($user) {
	$redis = Redis::connection();
	// $redis->set('u'.$user->id, $user->email);
	// $redis->info();
	$redis->publish('auth.login', $user);
});
