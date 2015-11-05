<?php

class IngredientController extends BaseController {

	protected $ingredientHandler;

	public function __construct(IIngredientHandler $ingredientHandler)
	{
		$this->ingredientHandler = $ingredientHandler;
	}

	/**
	 * Shows the addOtheringredientView with the list
	 * of all other ingredients
     */
	public function showAddNewIngredient()
	{
		$data = array(
			'otherIngredients' => $this->ingredientHandler->get(),
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
		$this->ingredientHandler->set(Input::get('name'));

		$data = array(
			'otherIngredients' => $this->ingredientHandler->get(),
		);

		return View::make('addOtheringredientView')->with('data', $data);
	}

	/**
	 * Deletes all the checked ingredients in the view
	 */
	public function deleteIngredient()
	{
		$this->ingredientHandler->delete(Input::get('ingredient'));

		$data = array(
			'otherIngredients' => $this->ingredientHandler->get(),
		);

		return View::make('addOtheringredientView')->with('data', $data);
	}
}
