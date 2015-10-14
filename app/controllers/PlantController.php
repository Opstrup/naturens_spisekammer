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
        $newPlantId = $this->savePlantDataToDb();;
        $plantSeason = new PlantSeason;
        $plantSize = new PlantSize;
        $plantHabitat = new PlantHabitat;
        $plantColor = new PlantColor;

        list($seasonArray, $sizeArray, $habitatArray, $colorArray) = $this->savePlantAttributes();

        for ($index = 0; $index < 4; $index++)
        {
            if(Input::hasFile('photo_' . $index))
            {
                $photo = Input::file('photo_' . $index);
                $this->savePhoto($photo, $newPlantId, $index);
            }
            // @todo refactor this !
            else
            {
                $plantPhoto = new Photos;
                $plantPhoto->plant_id = $newPlantId;
                $plantPhoto->photo_url = 'null';
                $plantPhoto->save();
            }
        }

        $plantSeason->saveSeasonsToDb($newPlantId, $seasonArray);
        $plantSize->saveSizesToDb($newPlantId, $sizeArray);
        $plantHabitat->saveHabitatsToDb($newPlantId, $habitatArray);
        $plantColor->saveColorsToDb($newPlantId, $colorArray);

        return View::make('addPlantView');
    }

    /**
     * Gets all the plant information for a plant and
     * saves it to the database.
     * Returns the newly created plants id for further use
     */
    public function savePlantDataToDb()
    {
        $name = Input::get('name');
        $name_latin = Input::get('name_latin');
        $description = Input::get('description');
        $history = Input::get('history');
        $herb = Input::get('herb');
        $eatable = Input::get('eatable');

        $plantID = DB::table('plants')->insertGetId(
            array('name' => $name, 'name_latin' => $name_latin, 'description' => $description, 'history' => $history,
                  'herb' => $herb, 'eatable' => $eatable)
        );
        return $plantID;
    }

    /**
     * @param $photo = uploaded photo
     * @param $plantID = ID for the newly created plant
     * @param $photoNumber = number for which photo is being uploaded
     * @return bool = true if successful / false if error
     *
     * Moves the uploaded photo to the uploaded folder and creates a new folder for it
     * if no folder exists.
     */
    public function savePhoto($photo, $plantID, $photoNumber)
    {
        $fileName = $photoNumber . "-plant-" . $plantID . ".jpeg";
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

    public function editPhoto($photo, $plantID, $photoNumber)
    {
        $fileName = $photoNumber . "-plant-" . $plantID . ".jpeg";
        $photoURL = "PlantPictures" . "/" . $plantID . "/";

        $editPhoto = Photos::where('plant_id', '=', $plantID)
            ->where('photo_url', '=', 'null')
            ->first();

        $editPhoto->photo_url = $photoURL . $fileName;
        $editPhoto->save();

        $photo->move(public_path() . "/" . "PlantPictures" . "/" . $plantID . "/" , $fileName);
    }

    /**
     * Finds the given plant from the id in the database
     * and deletes all the relationships to the plant, the folder in
     * PlantPictures which contains all pictures for the plant and the plant
     * it self.
     * @return empty add plant view
     */
    public function deletePlant()
    {
        $plantId = (Input::get('plantId'));

        File::deleteDirectory(public_path() . '/PlantPictures/' . $plantId);
        $this->deletePlantAttributes($plantId);
        Plants::where('id', '=', $plantId)->delete();

        return View::make('addPlantView');
    }

    /**
     * Finds the plant from the id and all its relationships in the database
     * and passes it to the view, so the user can edit the data.
     * @return edit plant view with all the data as default from the plant
     */
    public function showEditPlant()
    {
        $plantId = (Input::get('plantId'));

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

        return View::make('editPlantView')->with('data', $data);
    }

    public function editPlant()
    {
        $plantId = Input::get('plantId');
        $thePlant = Plants::find($plantId);

        $plantSeason = new PlantSeason;
        $plantSize = new PlantSize;
        $plantHabitat = new PlantHabitat;
        $plantColor = new PlantColor;

        $thePlant->name = Input::get('name');
        $thePlant->name_latin = Input::get('name_latin');
        $thePlant->description = Input::get('description');
        $thePlant->history = Input::get('history');
        $thePlant->herb = Input::get('herb');
        $thePlant->eatable = Input::get('eatable');

        $this->deletePlantAttributes($plantId);

        $thePlant->save();

        list($seasonArray, $sizeArray, $habitatArray, $colorArray) = $this->savePlantAttributes();

        for ($index = 0; $index < 4; $index++)
        {
            if(Input::hasFile('photo_' . $index))
            {
                $photo = Input::file('photo_' . $index);
                $this->editPhoto($photo, $plantId, $index);
            }
        }

        $plantSeason->saveSeasonsToDb($plantId, $seasonArray);
        $plantSize->saveSizesToDb($plantId, $sizeArray);
        $plantHabitat->saveHabitatsToDb($plantId, $habitatArray);
        $plantColor->saveColorsToDb($plantId, $colorArray);

        return Redirect::to('plant-detail/' . $plantId);
    }

    /**
     * @param $plantId
     */
    public function deletePlantAttributes($plantId)
    {
        PlantColor::where('plant_id', '=', $plantId)->delete();
        PlantHabitat::where('plant_id', '=', $plantId)->delete();
        PlantSeason::where('plant_id', '=', $plantId)->delete();
        PlantSize::where('plant_id', '=', $plantId)->delete();
    }

    /**
     * @return array
     */
    public function savePlantAttributes()
    {
        $seasonArray = array('spring' => Input::get('spring'), 'summer' => Input::get('summer'),
            'autumn' => Input::get('autumn'), 'winter' => Input::get('winter'));

        $sizeArray = array('10' => Input::get('10'), '10-25' => Input::get('10-25'), '25-40' => Input::get('25-40'),
            '40-50' => Input::get('40-50'), '50-75' => Input::get('50-75'), '75-100' => Input::get('75-100'),
            '100' => Input::get('100'));

        $habitatArray = array('farmland' => Input::get('farmland'), 'wetland' => Input::get('wetland'),
            'forest' => Input::get('forest'), 'moor' => Input::get('moor'), 'coast' => Input::get('coast'));

        $colorArray = array('red' => Input::get('red'), 'yellow' => Input::get('yellow'), 'blue' => Input::get('blue'),
            'green' => Input::get('green'), 'brown' => Input::get('brown'));
        return array($seasonArray, $sizeArray, $habitatArray, $colorArray);
    }

    /**
     * @param $plantID
     * @param $photoID
     * Deletes the given photo from a plat, deletes the photo in the public folder and
     * the relationship in the database
     */
    public function deletePhoto($plantID, $photoID)
    {
        $fileName = $photoID . '-plant-' . $plantID . '.jpeg';
        $deleteRow = '/PlantPictures/' . $plantID . '/' . $fileName;

        File::delete(public_path() . '/PlantPictures/' . $plantID . '/' . $fileName);
        Photos::where('photo_url', '=', $deleteRow)->delete();
    }
}