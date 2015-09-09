<?php

class IngredientController extends BaseController {

	/**
	 * Shows the addOtheringredientView with the list
	 * of all other ingredients
     */
	public function showAddNewIngredient()
	{
		$otherIngredients = Otheringredients::all();

		$data = array(
			'otherIngredients' => $otherIngredients,
		);

		return View::make('addOtheringredientView')->with('data', $data);
	}

	/**
	 * Adds the new ingredient to the database and shows
	 * the addOtheringredientView again with the new ingredient added
	 * to the list of other ingredients
     */
	public function AddNewIngredientToDb()
	{
		$ingredient = new Otheringredients;
		$ingredient->name = Input::get('name');
		$ingredient->save();

		$otherIngredients = Otheringredients::all();

		$data = array(
			'otherIngredients' => $otherIngredients,
		);

		return View::make('addOtheringredientView')->with('data', $data);
	}

}
