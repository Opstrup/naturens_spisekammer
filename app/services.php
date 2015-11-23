<?php
/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 19/10/2015
 * Time: 17.15
 */

if (App::environment('local') || App::environment('testing'))
{
    $app->bind('IPhotoHandler', 'LocalDevPhotoHandler');
}
else
{
    $app->bind('IPhotoHandler', 'LivePhotoHandler');
}

$app->bind('IColorHandler', 'ColorHandler');
$app->bind('IHabitatHandler', 'HabitatHandler');
$app->bind('ISeasonHandler', 'SeasonHandler');
$app->bind('ISizeHandler', 'SizeHandler');
$app->bind('IIngredientHandler', 'IngredientHandler');
$app->bind('IApplicationHandler', 'ApplicationHandler');

