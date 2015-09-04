<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
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

	public function showAbout()
	{
		return View::make('aboutView');
	}

}
