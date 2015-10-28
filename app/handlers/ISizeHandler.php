<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 27/10/2015
 * Time: 11.12
 */
interface ISizeHandler
{
    public function get($plantID);
    public function set($plantID, $sizeArray);
    public function delete($plantID);
    public function edit($plantID, $sizeArray);
}