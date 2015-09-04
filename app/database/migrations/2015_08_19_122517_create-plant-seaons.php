<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantSeaons extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plant_seasons', function($newTable)
		{
			$newTable->increments('id');
			$newTable->integer('plant_id');
			$newTable->integer('season_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plant_seasons');
	}

}
