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
        $plantColor = new PlantColor;
        $plantHabitat = new PlantHabitat;
        $plantSize = new PlantSize;
        $plantPhoto = new Photos;

        $seasonArray = $plantSeason->findSeasonsForPlant($plantId);
        $colorArray = $plantColor->findColorsForPlant($plantId);
        $habitatArray = $plantHabitat->findHabitatsForPlant($plantId);
        $sizeArray = $plantSize->findSizesForPlant($plantId);
        $photoArray = $plantPhoto->findPhotosForPlant($plantId);

        $data = array(
            'plant' => $thePlant,
            'seasons' => $seasonArray,
            'colors' => $colorArray,
            'habitats' => $habitatArray,
            'sizes' => $sizeArray,
            'photos' => $photoArray,
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

        $newPlantId = sizeof($plants)+1;
        $plantSeason = new PlantSeason;
        $plantSize = new PlantSize;
        $plantHabitat = new PlantHabitat;
        $plantColor = new PlantColor;

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

        // @todo Save the path to the photo to the photo table

        if($this->savePhoto($photo, $newPlantId))
        {
            $plantSeason->saveSeasonsToDb($newPlantId, $seasonArray);
            $plantSize->saveSizesToDb($newPlantId, $sizeArray);
            $plantHabitat->saveHabitatsToDb($newPlantId, $habitatArray);
            $plantColor->saveColorsToDb($newPlantId, $colorArray);

            $newPlant->save();
        }
        else
        {
            return View::make('error');
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

    /**
     * @param $photo = uploaded photo
     * @param $plantID = ID for the newly created plant
     * @return bool = true if successful / false if error
     *
     * Moves the uploaded photo to the uploaded folder and creates a new folder for it
     * if no folder exists.
     */
    public function savePhoto($photo, $plantID)
    {
        $fileName = time() . "-plant-" . $plantID . ".jpeg";
        $photoURL = "PlantPictures" . "/" . $plantID . "/";

        $plantPhoto = new Photos;
        $plantPhoto->plant_id = $plantID;
        $plantPhoto->photo_url = $photoURL . $fileName;
        $plantPhoto->save();

        if($photo) {
            $photo->move(public_path() . "/" . "PlantPictures" . "/" . $plantID . "/" , $fileName);
            return true;
        } else {
            return false;
        }
    }


}