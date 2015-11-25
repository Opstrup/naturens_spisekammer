<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 23/11/2015
 * Time: 14.09
 */
Interface IApplicationHandler
{
    public function get($plantID);
    public function set($plantID, $applicationArray);
    public function delete($plantID);
    public function edit($plantID, $applicationArray);
}