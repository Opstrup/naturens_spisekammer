<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 03/10/2015
 * Time: 22.52
 */
class PlantSize extends Eloquent
{
    public $timestamps = false;

    /**
     * Table values
     */
    private $TEN_ID = 1;
    private $TEN_TWENTYFIVE_ID = 2;
    private $TWENTYFIVE_FORTY_ID = 3;
    private $FORTY_FIFTY_ID = 4;
    private $FIFTY_SEVENTYFIVE_ID = 5;
    private $SEVENTYFIVE_HUNDRED_ID = 6;
    private $HUNDRED_ID = 7;

    function saveSizesToDb($plantId, $sizesArray)
    {
        foreach($sizesArray as $key => $size)
        {
            if ($size)
            {
                $newSize = new PlantHabitat;
                $newSize->plant_id = $plantId;

                switch($key)
                {
                    case $key == '10':
                        $newSize->size_id = $this->TEN_ID;
                        break;
                    case $key == '10-25':
                        $newSize->size_id = $this->TEN_TWENTYFIVE_ID;
                        break;
                    case $key == '25-40':
                        $newSize->size_id = $this->TWENTYFIVE_FORTY_ID;
                        break;
                    case $key == '40-50':
                        $newSize->size_id = $this->FORTY_FIFTY_ID;
                        break;
                    case $key == '50-75':
                        $newSize->size_id = $this->FIFTY_SEVENTYFIVE_ID;
                        break;
                    case $key == '75-100':
                        $newSize->size_id = $this->SEVENTYFIVE_HUNDRED_ID;
                        break;
                    case $key == '100':
                        $newSize->size_id = $this->HUNDRED_ID;
                        break;
                }

                $newSize->save();
            }
        }
    }
}