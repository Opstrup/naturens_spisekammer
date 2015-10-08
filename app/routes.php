<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

Route::get('/about', 'HomeController@showAbout');

/**
 * Plant routs
 */
Route::resource('add-new-plant', 'PlantController@showAddNewPlant');
Route::resource('add-new-plant', 'PlantController@addNewPlantToDb');
Route::get('/plant-detail/{plantId}', 'PlantController@showPlantDetail');

/**
 * Recipe routs
 */
Route::get('/add-new-recipe', 'RecipeController@showAddNewRecipe');
Route::post('/add-new-recipe', 'RecipeController@addNewRecipeToDb');
Route::get('/recipe-detail/{recipeId}', 'RecipeController@showRecipeDetail');

/**
 * Ingredient routs
 */
Route::get('/add-new-ingredient', 'IngredientController@showAddNewIngredient');
Route::post('/add-new-ingredient', 'IngredientController@AddNewIngredientToDb');


/**
 * RESTful API
 */

Route::resource('apiPlant', 'apiPlantController');