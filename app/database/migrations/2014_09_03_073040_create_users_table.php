<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	private function _create() {
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('password', 60);
			$table->string('photo_url')->nullable()->default(NULL);
			// $table->dateTime('join_at')->nullable();
			$table->string('remember_token', 100);
			$table->timestamps();
		});
	}
	public function _drop() {
		Schema::dropIfExists('users');
	}
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::dropIfExists('users');
		$this->_create();
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('users');
	}

    public function ddd()
    {

    }

}
