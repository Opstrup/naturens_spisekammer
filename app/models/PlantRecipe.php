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