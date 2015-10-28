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

require __DIR__.'/services.php';

Route::get('/', 'HomeController@showWelcome');

Route::get('about', 'HomeController@showAbout');

/**
 * Plant routs
 */
Route::get('add-new-plant', 'PlantController@showAddNewPlant');
Route::post('add-new-plant', 'PlantController@addNewPlantToDb');
Route::post('delete-plant', 'PlantController@deletePlant');
Route::post('show-edit-plant', 'PlantController@showEditPlant');
Route::post('edit-plant', 'PlantController@editPlant');
Route::get('plant-detail/{plantId}', 'PlantController@showPlantDetail');
Route::post('plant-detail/{plantId}', 'PlantController@showPlantDetail');

/**
 * Recipe routs
 */
Route::get('add-new-recipe', 'RecipeController@showAddNewRecipe');
Route::post('add-new-recipe', 'RecipeController@addNewRecipeToDb');
Route::get('recipe-detail/{recipeId}', 'RecipeController@showRecipeDetail');

/**
 * Ingredient routs
 */
Route::get('add-new-ingredient', 'IngredientController@showAddNewIngredient');
Route::post('add-new-ingredient', 'IngredientController@AddNewIngredientToDb');
Route::post('delete-ingredient', 'IngredientController@deleteIngredient');


/**
 * RESTful API
 */

Route::resource('apiPlant', 'apiPlantController');