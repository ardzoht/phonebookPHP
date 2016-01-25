<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 25);
			$table->string('last_name', 25);
			$table->string('address', 50);
			$table->string('phone', 25);
			$table->string('email', 25);
            $table->integer('phone_type')->unsigned();
			$table->foreign('phone_type')->references('id')->on('phone_type');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
