<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlants extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plants', function($newTable)
		{
			$newTable->increments('id');
			$newTable->string('name');
			$newTable->string('name_latin');
			$newTable->longText('description');
			$newTable->longText('history');
			$newTable->boolean('herb')->nullable();
			$newTable->boolean('eatable')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plants');
	}

}
