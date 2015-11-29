<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

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
			$table->string('fname');
			$table->string('lname');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('sex');
			$table->string('department');
			$table->integer('grade')->default(1);
			$table->integer('group')->default(0);
			$table->string('nickname');
			$table->integer('activate')->default(0);
			$table->string('activate_code')->nullable();
			$table->rememberToken();
			$table->nullableTimestamps();
		});
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

}
