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
			$table->integer('Teacher_ID')->unsigned();
			
			$table->foreign('Teacher_ID')
			      ->references('id')->on('teachers')
			      ->onDelete('cascade');

			$table->string('Course_No');

			$table->foreign('Course_No')
			      ->references('Course_No')->on('courses')
			      ->onDelete('cascade');

			$table->primary(['Teacher_ID', 'Course_No']);
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
