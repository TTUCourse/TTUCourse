<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextbooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('textbooks', function(Blueprint $table)
		{
			$table->string('title');
			$table->string('Author');
			$table->double('Edition', 5, 2);
			$table->string('Publisher');
			$table->string('ISBN')->primary();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('textbooks');
	}

}
