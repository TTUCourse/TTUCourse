<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('says', function(Blueprint $table)
		{
			$table->integer('comment_uuid')->unsigned();

			$table->foreign('comment_uuid')
			      ->references('comment_uuid')->on('comments')
			      ->onDelete('cascade');

			$table->integer('user_id')->unsigned();

			$table->foreign('user_id')
			      ->references('id')->on('users')
			      ->onDelete('cascade');

			$table->primary(['comment_uuid', 'user_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('says');
	}

}
