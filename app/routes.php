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

Route::get('/', 'HomeController@showWelcome')->before('auth.basic');

Route::get('about', 'HomeController@showAbout')->before('auth.basic');

/**
 * Plant routs
 */
Route::get('add-new-plant', 'PlantController@showAddNewPlant')->before('auth.basic');
Route::post('add-new-plant', 'PlantController@addNewPlantToDb');
Route::post('delete-plant', 'PlantController@deletePlant');
Route::post('show-edit-plant', 'PlantController@showEditPlant');
Route::post('edit-plant', 'PlantController@editPlant');
Route::get('plant-detail/{plantId}', 'PlantController@showPlantDetail')->before('auth.basic');
Route::post('plant-detail/{plantId}', 'PlantController@showPlantDetail');

/**
 * Recipe routs
 */
Route::get('add-new-recipe', 'RecipeController@showAddNewRecipe')->before('auth.basic');
Route::post('add-new-recipe', 'RecipeController@addNewRecipeToDb');
Route::get('recipe-detail/{recipeId}', 'RecipeController@showRecipeDetail')->before('auth.basic');

/**
 * Ingredient routs
 */
Route::get('add-new-ingredient', 'IngredientController@showAddNewIngredient')->before('auth.basic');
Route::post('add-new-ingredient', 'IngredientController@AddNewIngredientToDb');


/**
 * RESTful API
 */

Route::resource('apiPlant', 'apiPlantController');