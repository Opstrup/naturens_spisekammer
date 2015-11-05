<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 29/10/2015
 * Time: 09.36
 */
interface IIngredientHandler
{
    public function get();
    public function set($ingredient);
    public function delete($ingredientIdArray);
}