<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 19/08/15
 * Time: 20.28
 */
class RecipeController extends BaseController
{
    public function showAddNewRecipe()
    {
        $plants = Plants::all();

        return View::make('addRecipeView')->with('plants', $plants);
    }

    public function addNewRecipeToDb()
    {
        $newRecipe = new Recipes;
        $plantRecipe = new PlantRecipe;
        $recipeId = sizeof(Recipes::all())+1;
        $plants = Plants::all();
        $plantsAddedToRecipeArray = array();

        $this->recipeSetup($newRecipe);

        foreach ($plants as $plant)
        {
            if (Input::get('plantId_' . $plant->id) === 'yes')
                $plantsAddedToRecipeArray[] = $plant->id;
        }

        $plantRecipe->savePlantRecipeConnectionToDb($recipeId, $plantsAddedToRecipeArray);
        $newRecipe->save();

        return View::make('addRecipeView')->with('plants', $plants);
    }

    public function showRecipeDetail($recipeId)
    {
        $theRecipe = Recipes::find($recipeId);
        $plantRecipe = new PlantRecipe;

        $plantsForRecipe = $plantRecipe->findPlantsForRecipe($recipeId);

        $data = array(
            'recipe' => $theRecipe,
            'plants' => $plantsForRecipe
        );

        return View::make('recipeDetailView')->with('data', $data);
    }

    /**
     * @param $newRecipe
     */
    public function recipeSetup($newRecipe)
    {
        $newRecipe->name = Input::get('name');
        $newRecipe->storage = Input::get('storage');
        $newRecipe->guide = Input::get('guide');
        $newRecipe->type = Input::get('type');
    }

}