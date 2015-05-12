<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->string('Course_name');
			$table->string('Course_No')->primary();
			$table->integer('Credit');
			$table->integer('Enrollment_limit');
			$table->string('Department');
			$table->double('Rank', 3, 2);
			$table->string('Room');
			$table->string('Textbook');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courses');
	}

}
