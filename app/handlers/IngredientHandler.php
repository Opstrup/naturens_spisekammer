<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 29/10/2015
 * Time: 09.36
 */
class IngredientHandler implements IIngredientHandler
{

    public function get()
    {
        return Otheringredients::all();
    }

    public function set($name)
    {
        $ingredient = new Otheringredients;
        $ingredient->name = $name;
        $ingredient->save();
    }

    public function delete($ingredientIdArray)
    {
        if(is_array($ingredientIdArray))
        {
            foreach($ingredientIdArray as $ingredientID)
            {
                Otheringredients::where('id', '=', $ingredientID)->delete();
            }
        }
    }
}