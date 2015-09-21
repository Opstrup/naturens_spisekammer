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
        $otherIngredients = Otheringredients::all();

        $data = array(
            'plants' => $plants,
            'otherIngredients' => $otherIngredients
        );

        return View::make('addRecipeView')->with('data', $data);
    }

    public function addNewRecipeToDb()
    {
        // @todo all otherIngredients to the recipe as well
        $newRecipe = new Recipes;
        $plantRecipe = new PlantRecipe;
        $recipeId = sizeof(Recipes::all())+1;
        $plants = Plants::all();
        //$otherIngredients = Otheringredients::all();
        $plantsAddedToRecipeArray = array();

        $this->recipeSetup($newRecipe);

        // finding which plant is checked in the list of plants in the view
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
            // @todo add functionality for otherIngredients here
        );

        return View::make('recipeDetailView')->with('data', $data);
    }

    /**
     * Sets up the recipe with all the basic data needed
     * for a recipe
     */
    public function recipeSetup($newRecipe)
    {
        $newRecipe->name = Input::get('name');
        $newRecipe->storage = Input::get('storage');
        $newRecipe->guide = Input::get('guide');
        $newRecipe->type = Input::get('type');
    }

}