<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments_tos', function(Blueprint $table)
		{
			$table->string('course_no');

			$table->foreign('course_no')
			      ->references('course_no')->on('courses')
			      ->onDelete('cascade');

			$table->integer('comment_uuid')->unsigned();

			$table->foreign('comment_uuid')
			      ->references('comment_uuid')->on('comments')
			      ->onDelete('cascade');

			$table->primary(['course_no', 'comment_uuid']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments_tos');
	}

}
