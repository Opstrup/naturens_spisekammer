<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 20/08/15
 * Time: 13.01
 */

class PlantSeason extends Eloquent
{
    public $timestamps = false;

    /**
     * Table values
     */
    private $SPRING_ID = 1;
    private $SUMMER_ID = 2;
    private $AUTUMN_ID = 3;
    private $WINTER_ID = 4;

    /**
     * @param $plantId = Id of the newly created plant
     * @param $seasonArray = Array filled with the four seasons,
     * an season will have the value 1 if the plant lives in the season.
     * NULL if the plant does not live in the given season.
     */
    public function saveSeasonsToDb($plantId, $seasonArray)
    {
        foreach($seasonArray as $key => $season)
        {
            if ($season)
            {
                $newSeason = new PlantSeason;
                $newSeason->plant_id = $plantId;

                switch($key)
                {
                    case $key == 'spring':
                        $newSeason->season_id = $this->SPRING_ID;
                        break;
                    case $key == 'summer':
                        $newSeason->season_id = $this->SUMMER_ID;
                        break;
                    case $key == 'autumn':
                        $newSeason->season_id = $this->AUTUMN_ID;
                        break;
                    case $key == 'winter':
                        $newSeason->season_id = $this->WINTER_ID;
                        break;
                }

                $newSeason->save();
            }
        }

    }

    /**
     * @param $plantId
     * @return formattede array with seasons for the plant
     */
    public function findSeasonsForPlant($plantId)
    {
        $seasons = PlantSeason::where('plant_id', '=', $plantId)->get();
        $seasonArray = array();

        foreach ($seasons as $season)
        {
            switch($season)
            {
                case $season['season_id'] == strval($this->SPRING_ID):
                    $seasonArray[] = 'spring';
                    break;
                case $season['season_id'] == strval($this->SUMMER_ID):
                    $seasonArray[] = 'summer';
                    break;
                case $season['season_id'] == strval($this->AUTUMN_ID):
                    $seasonArray[] = 'autumn';
                    break;
                case $season['season_id'] == strval($this->WINTER_ID):
                    $seasonArray[] = 'winter';
                    break;
            }
        }

        return $seasonArray;
    }
}