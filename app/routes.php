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
Route::get('/add-new-plant', 'PlantController@showAddNewPlant');
Route::post('/add-new-plant', 'PlantController@addNewPlantToDb');
Route::get('/plant-detail/{plantId}', 'PlantController@showPlantDetail');

/**
 * Recipe routs
 */
Route::get('/add-new-recipe', 'RecipeController@showAddNewRecipe');
Route::post('/add-new-recipe', 'RecipeController@addNewRecipeToDb');
Route::get('/recipe-detail/{recipeId}', 'RecipeController@showRecipeDetail');