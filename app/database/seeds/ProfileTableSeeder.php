<?php

class ProfileTableSeeder extends Seeder {
	public function run() {
		DB::table('profiles')->delete();
		$profiles = [
		     [
		         'user_id' => 1,
		         'location'    => 'SYD',
		     ],
		     [
		         'user_id' => '2',
		         'location'    => 'MEL',
		     ]
		 ];
		 DB::table('profiles')->insert($profiles);
	}
}