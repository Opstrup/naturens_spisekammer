<?php

class IngredientController extends BaseController {

	public function showAddNewIngredient()
	{
		$otherIngredients = Otheringredients::all();

		$data = array(
			'otherIngredients' => $otherIngredients,
		);

		return View::make('addOtheringredientView')->with('data', $data);
	}

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
