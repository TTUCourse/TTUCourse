<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instructs', function(Blueprint $table)
		{
			$table->integer('teacher_id')->unsigned();

			$table->foreign('teacher_id')
			      ->references('id')->on('teachers')
			      ->onDelete('cascade');

			$table->string('course_no');

			$table->foreign('course_no')
			      ->references('course_no')->on('courses')
			      ->onDelete('cascade');

			$table->primary(['teacher_id', 'course_no']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('instructs');
	}

}
