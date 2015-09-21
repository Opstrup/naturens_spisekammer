<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 18/08/15
 * Time: 14.40
 */
class PlantController extends BaseController
{

    /**
     * Displays the addPlantView at url /add-new-plant
     */
    public function showAddNewPlant()
    {
        return View::make('addPlantView');
    }

    /**
     * Displays the plantDetailView at url /plant-detail/#
     * The method finds the plant in the database and returns the
     * plantDetailView with all the details about the specific plant
     */
    public function showPlantDetail($plantId)
    {
        $thePlant = Plants::find($plantId);
        $plantSeason = new PlantSeason;
        $seasonArray = $plantSeason->findSeasonsForPlant($plantId);

        $data = array(
            'plant' => $thePlant,
            'seasons' => $seasonArray,
        );

        return View::make('plantDetailView')->with('data', $data);
    }

    /**
     * Adds a new plant to the database with all the dependency set up
     * for it. The view is at url /add-new-plant
     */
    public function addNewPlantToDb()
    {
        $plants = Plants::all();
        $plantSeason = new PlantSeason;

        $newPlantId = sizeof($plants)+1;
        $newPlant = new Plants;

        $this->setupPlantInformation($newPlant);

        $seasonArray = array('spring' => Input::get('spring'), 'summer' => Input::get('summer'),
                             'autumn' => Input::get('autumn'), 'winter' => Input::get('winter'));

        $plantSeason->saveSeasonsToDb($newPlantId, $seasonArray);

        $newPlant->save();

        return View::make('addPlantView');
    }

    /**
     * @param $newPlant = Plant that is being created for the database
     */
    public function setupPlantInformation($newPlant)
    {
        $newPlant->name = Input::get('name');
        $newPlant->name_latin = Input::get('name_latin');
        $newPlant->description = Input::get('description');
        $newPlant->history = Input::get('history');
        $newPlant->herb = Input::get('herb');
        $newPlant->eatable = Input::get('eatable');
    }


}