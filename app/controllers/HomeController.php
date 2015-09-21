<?php

class HomeController extends BaseController {

	/**
	 * Shows the welcome view with a list with all plants in system
	 * and a list with all recipes in system
     */
	public function showWelcome()
	{
		$plants = Plants::all();
		$recipes = Recipes::all();

		$data = array(
			'plants' => $plants,
			'recipes' => $recipes
		);

		return View::make('welcomeView')->with('data', $data);
	}

	/**
	 * Shows the about view
     */
	public function showAbout()
	{
		return View::make('aboutView');
	}

}
