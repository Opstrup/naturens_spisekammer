<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 27/10/2015
 * Time: 11.12
 */
interface IHabitatHandler
{
    public function get($plantID);
    public function set($plantID, $habitatArray);
    public function delete($plantID);
    public function edit($plantID, $habitatArray);
}