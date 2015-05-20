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
			$table->integer('Comment_UUID')->unsigned();

			$table->foreign('Comment_UUID')
			      ->references('Comment_UUID')->on('comments')
			      ->onDelete('cascade');
			      
			$table->integer('user_id')->unsigned();

			$table->foreign('user_id')
			      ->references('id')->on('users')
			      ->onDelete('cascade');

			$table->primary(['Comment_UUID', 'user_id']);
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
