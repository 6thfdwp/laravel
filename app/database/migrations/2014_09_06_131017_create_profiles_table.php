<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

	private function _create() {
		Schema::create('profiles', function($table) {
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			// $table->string('gender')->nullable()->default(NULL);
			$table->string('location')->nullable()->default(NULL);
			$table->string('photo_url')->nullable()->default(NULL);
			$table->timestamps();
			// constraints
            $table->foreign('user_id')
                  ->references('id')->on('users');
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
		});
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('profiles');
		$this->_create();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
