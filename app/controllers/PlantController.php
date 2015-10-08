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
        $plantSize = new PlantSize;
        $plantHabitat = new PlantHabitat;
        $plantColor = new PlantColor;

        $newPlantId = sizeof($plants)+1;
        $newPlant = new Plants;

        $this->setupPlantInformation($newPlant);

        $seasonArray = array('spring' => Input::get('spring'), 'summer' => Input::get('summer'),
                             'autumn' => Input::get('autumn'), 'winter' => Input::get('winter'));

        $sizeArray = array('10' => Input::get('10'), '10-25' => Input::get('10-25'), '25-40' => Input::get('25-40'),
                           '40-50' => Input::get('40-50'), '50-75' => Input::get('50-75'), '75-100' => Input::get('75-100'),
                           '100' => Input::get('100'));

        $habitatArray = array('farmland' => Input::get('farmland'), 'wetland' => Input::get('wetland'),
                              'forest' => Input::get('forest'), 'moor' => Input::get('moor'), 'coast' => Input::get('coast'));

        $colorArray = array('red' => Input::get('red'), 'yellow' => Input::get('yellow'), 'blue' => Input::get('blue'),
                            'green' => Input::get('green'), 'brown' => Input::get('brown'));

        $photo = Input::file('photo');

        if($this->savePhoto($photo, $newPlantId))
        {
            $plantSeason->saveSeasonsToDb($newPlantId, $seasonArray);

            $newPlant->save();
        }

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

    public function savePhoto($photo, $plantID)
    {
        if($photo) {
            $photo->move(public_path() . "/" . "PlantPictures" . "/" . $plantID . "/", "plant-" . $plantID);
            return true;
        } else {
            return false;
        }
    }


}