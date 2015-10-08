<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 03/10/2015
 * Time: 22.50
 */
class PlantColor extends Eloquent
{
    public $timestamps = false;

    /**
     * Table values
     */
    private $RED_ID = 1;
    private $YELLOW_ID = 2;
    private $BLUE_ID = 3;
    private $GREEN_ID = 4;
    private $BROWN_ID = 5;

    function saveColorsToDb($plantId, $colorsArray)
    {
        foreach($colorsArray as $key => $color)
        {
            if ($color)
            {
                $newColor = new PlantSeason;
                $newColor->plant_id = $plantId;

                switch($key)
                {
                    case $key == 'red':
                        $newColor->color_id = $this->RED_ID;
                        break;
                    case $key == 'yellow':
                        $newColor->color_id = $this->YELLOW_ID;
                        break;
                    case $key == 'blue':
                        $newColor->color_id = $this->BLUE_ID;
                        break;
                    case $key == 'green':
                        $newColor->color_id = $this->GREEN_ID;
                        break;
                    case $key == 'brown':
                        $newColor->color_id = $this->BROWN_ID;
                        break;
                }

                $newColor->save();
            }
        }
    }
}