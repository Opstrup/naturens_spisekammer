<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherIngredientRecipes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('otheringredients-recipes', function($newTable)
		{
			$newTable->increments('id');
			$newTable->integer('recipe_id');
			$newTable->integer('otheringredient_id');
			$newTable->integer('amount');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('otheringredients-recipes');
	}

}
