<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recipes', function($newTable)
		{
			$newTable->increments('id');
			$newTable->string('name');
			$newTable->longText('storage');
			$newTable->longText('guide');
			$newTable->string('type');
			$newTable->boolean('favorite')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('recipes');
	}

}
