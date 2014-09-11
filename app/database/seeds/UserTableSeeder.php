<?php

class UserTableSeeder extends Seeder {
	public function run() {
		DB::table('users')->delete();
		$users = [
		     [
		         'first_name' => 'msurguy',
		         'last_name'  => 'mmmmmm',
		         'email'    => 'user1@example.com',
		         'password' => Hash::make('password')
		     ],
		     [
		         'first_name' => 'stidges',
		         'last_name' => 'stidges',
		         'email'    => 'user2@example.com',
		         'password' => Hash::make('password')
		     ]
		 ];
		 DB::table('users')->insert($users);
		// User.create( 
		// 	array('first_name'=> '1111', 'last_name'=>'2222',
		// 		  'password'=>Hash::make('password'), 'email'=>'32@gmail') 
		// );
		// User.create( 
		// 	array('first_name'=> '5555', 'last_name'=>'6666',
		// 		  'password'=>Hash::make('password'), 'email'=>'332@gmail') 
		// );
	}
}