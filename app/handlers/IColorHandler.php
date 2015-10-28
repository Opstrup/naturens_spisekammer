<?php
/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 26/10/2015
 * Time: 10.27
 */

Interface IColorHandler
{
    public function get($plantID);
    public function set($plantID, $colorsArray);
    public function delete($plantID);
    public function edit($plantID, $colorsArray);
}