<?php
/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 03/09/15
 * Time: 13.22
 */

class PlantRecipe extends Eloquent
{
    public $timestamps = false;

    /**
     * Saves the connection between the plant and the recipe to the helper table
     * called plant_recipes
     * @param $recipeId
     * @param $plantArray
     */
    public function savePlantRecipeConnectionToDb($recipeId, $plantArray)
    {
        foreach ($plantArray as $plant)
        {
            $plantRecipe = new PlantRecipe;

            $plantRecipe->recipe_id = $recipeId;
            $plantRecipe->plant_id = $plant;

            $plantRecipe->save();
        }
    }

    /**
     * Finds all the plant associated with the given recipe
     * @param $recipeId
     * @return array
     */
    public function findPlantsForRecipe($recipeId)
    {
        $plants = PlantRecipe::where('recipe_id', '=', $recipeId)->get();
        $plantArray = array();

        foreach ($plants as $plant)
        {
            $plantArray[] = Plants::where('id', '=', $plant['plant_id'])->get()[0];
        }

        return $plantArray;
    }
}