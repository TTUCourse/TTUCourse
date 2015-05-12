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
			$table->string('Course_No');
			$table->foreign('Course_No')
			->references('Course_No')->on('courses')
			->onDelete('cascade');
			$table->string('Comment_UUID');
			$table->foreign('Comment_UUID')
			->references('Comment_UUID')->on('comments')
			->onDelete('cascade');
			$table->primary(['Course_No', 'Comment_UUID']);
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
