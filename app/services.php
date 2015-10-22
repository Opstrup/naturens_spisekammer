<?php
/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 19/10/2015
 * Time: 17.15
 */

if (App::environment('local'))
{
    $app->bind('IPhotoHandler', 'LocalDevPhotoHandler');
}
else
{
    $app->bind('IPhotoHandler', 'LivePhotoHandler');
}
