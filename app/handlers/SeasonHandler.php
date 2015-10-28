<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 27/10/2015
 * Time: 11.35
 */
class SeasonHandler implements ISeasonHandler
{
    protected $translationsArray = array('Forår' => 'spring', 'Sommer' => 'summer', 'Efterår' => 'autumn',
        'Vinter' => 'winter');

    public function get($plantID)
    {
        $SeasonsForPlant = PlantSeason::where('plant_id', '=', $plantID)->get();
        $seasonArray = array();
        $translatedSeasonArray = array();

        foreach ($SeasonsForPlant as $season)
        {
            $seasonArray[] = Seasons::where('id', '=', $season['season_id'])->get()[0]['season'];
        }

        foreach ($seasonArray as $season)
        {
            if(array_search($season, $this->translationsArray))
                $translatedSeasonArray[] = array_search($season, $this->translationsArray);
        }

        return $translatedSeasonArray;
    }

    public function set($plantID, $seasonArray)
    {
        $seasons = Seasons::all();
        $seasonArray = $this->filterArray($seasonArray);
        $cleanSeasons = $this->cleanModelArray($seasons);

        foreach($seasonArray as $season)
        {
            if(is_numeric(array_search($season, $cleanSeasons)))
            {
                $newSeason = new PlantSeason;
                $newSeason->plant_id = $plantID;
                $newSeason->season_id = array_search($season, $cleanSeasons) + 1;
                $newSeason->save();
            }
        }
    }

    public function delete($plantID)
    {
        PlantSeason::where('plant_id', '=', $plantID)->delete();
    }

    public function edit($plantID, $seasonArray)
    {
        $this->delete($plantID);
        $this->set($plantID, $seasonArray);
    }

    private function filterArray($array)
    {
        $cleanArray = array();

        foreach($array as $key => $element)
        {
            if($element)
                $cleanArray[] = $key;
        }

        return $cleanArray;
    }

    private function cleanModelArray($array)
    {
        $cleanArray = array();

        foreach($array as $element)
        {
            $cleanArray[] = $element->season;
        }

        return $cleanArray;
    }
}