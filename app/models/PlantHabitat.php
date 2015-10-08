<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 03/10/2015
 * Time: 22.53
 */
class PlantHabitat extends Eloquent
{
    public $timestamps = false;

    /**
     * Table values
     */
    private $FARMLAND_ID = 1;
    private $WETLAND_ID = 2;
    private $FOREST_ID = 3;
    private $MOOR_ID = 4;
    private $COAST_ID = 5;

    function saveHabitatsToDb($plantId, $habitatsArray)
    {
        foreach($habitatsArray as $key => $habitat)
        {
            if ($habitat)
            {
                $newHabitat = new PlantHabitat;
                $newHabitat->plant_id = $plantId;

                switch($key)
                {
                    case $key == 'farmland':
                        $newHabitat->habitat_id = $this->FARMLAND_ID;
                        break;
                    case $key == 'wetland':
                        $newHabitat->habitat_id = $this->WETLAND_ID;
                        break;
                    case $key == 'forest':
                        $newHabitat->habitat_id = $this->FOREST_ID;
                        break;
                    case $key == 'moor':
                        $newHabitat->habitat_id = $this->MOOR_ID;
                        break;
                    case $key == 'coast':
                        $newHabitat->habitat_id = $this->COAST_ID;
                        break;
                }

                $newHabitat->save();
            }
        }
    }
}