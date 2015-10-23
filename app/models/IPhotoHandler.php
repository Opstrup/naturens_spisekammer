<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 19/10/2015
 * Time: 12.27
 */
interface IPhotoHandler
{
    public function get($plantID);
    public function set($plantID, $photoID, $photo);
    public function delete($plantID);
    public function edit($plantID, $photoID, $photo);
}