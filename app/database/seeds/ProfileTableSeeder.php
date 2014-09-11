<?php

class ProfileTableSeeder extends Seeder {
	public function run() {
		DB::table('profiles')->delete();
		$profiles = [
		     [
		         'user_id' => 1,
		         'gender'  => 'm',
		         'location'    => 'SYD',
		     ],
		     [
		         'user_id' => '2',
		         'gender'  => 'f',
		         'location'    => 'SYD',
		     ]
		 ];
		 DB::table('profiles')->insert($profiles);
	}
}