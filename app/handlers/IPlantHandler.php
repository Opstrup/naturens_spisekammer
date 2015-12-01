<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 30/10/2015
 * Time: 16.43
 */
interface IPlantHandler
{
    public function get($plantID);
    public function set($plantID, $seasonArray);
    public function delete($plantID);
    public function edit($plantID, $seasonArray);
}