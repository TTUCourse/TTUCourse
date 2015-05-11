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
			$tabel->string('title');
			$tabel->string('Author');
			$tabel->double('Edition', 5, 2);
			$tabel->string('Publisher');
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
