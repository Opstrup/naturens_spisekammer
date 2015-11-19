<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 18/08/15
 * Time: 14.40
 */
class PlantController extends BaseController
{
    protected $photoHandler, $habitatHandler, $colorHandler, $sizeHandler, $seasonHandler;

    public function __construct(IPhotoHandler $photoHandler, IColorHandler $colorHandler, IHabitatHandler $habitatHandler,
                                ISeasonHandler $seasonHandler, ISizeHandler $sizeHandler)
    {
        $this->photoHandler = $photoHandler;
        $this->colorHandler = $colorHandler;
        $this->habitatHandler = $habitatHandler;
        $this->seasonHandler = $seasonHandler;
        $this->sizeHandler = $sizeHandler;
    }

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
     * @param $plantId
     * @return
     */
    public function showPlantDetail($plantId)
    {
        $thePlant = Plants::find($plantId);

        $sizeArray = $this->sizeHandler->get($plantId);
        $seasonArray = $this->seasonHandler->get($plantId);
        $habitatArray = $this->habitatHandler->get($plantId);
        $photoArray = $this->photoHandler->get($plantId);
        $colorArray = $this->colorHandler->get($plantId);

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

        list($seasonArray, $sizeArray, $habitatArray, $colorArray) = $this->getPlantAttributes();

        for ($index = 0; $index < 4; $index++)
        {
            // @todo refactor this !
            if(Input::hasFile('photo_' . $index))
            {
                $photo = Input::file('photo_' . $index);
                $this->photoHandler->set($newPlantId, $index, $photo);
            }
            else
            {
                $this->photoHandler->set($newPlantId, $index, null);
            }
        }

        $this->sizeHandler->set($newPlantId, $sizeArray);
        $this->seasonHandler->set($newPlantId, $seasonArray);
        $this->habitatHandler->set($newPlantId, $habitatArray);
        $this->colorHandler->set($newPlantId, $colorArray);

        $photoArray = $this->photoHandler->get($newPlantId);

        $data = array(
            'photos' => $photoArray,
            'plantID' => $newPlantId
        );

        return View::make('cropView')->with('data', $data);
    }

    public function cropPhotos()
    {
        $plantID = Input::get('plantID');

        $cropArray = array (
            "photo-0" => array ( "x" => Input::get('photo_0x'), "y" => Input::get('photo_0y') ),
            "photo-1" => array ( "x" => Input::get('photo_1x'), "y" => Input::get('photo_1y') ),
            "photo-2" => array ( "x" => Input::get('photo_2x'), "y" => Input::get('photo_2y') ),
            "photo-3" => array ( "x" => Input::get('photo_3x'), "y" => Input::get('photo_3y') ), );

        $this->photoHandler->crop($plantID, $cropArray);

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
     * Finds the given plant from the id in the database
     * and deletes all the relationships to the plant, the folder in
     * PlantPictures which contains all pictures for the plant and the plant
     * it self.
     * @return empty add plant view
     */
    public function deletePlant()
    {
        $plantId = (Input::get('plantId'));

        $this->photoHandler->delete($plantId);
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
        $sizeArray = $this->sizeHandler->get($plantId);
        $habitatArray = $this->habitatHandler->get($plantId);
        $seasonArray = $this->seasonHandler->get($plantId);
        $colorArray = $this->colorHandler->get($plantId);
        $photoArray = $this->photoHandler->get($plantId);

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

        $thePlant->name = Input::get('name');
        $thePlant->name_latin = Input::get('name_latin');
        $thePlant->description = Input::get('description');
        $thePlant->history = Input::get('history');

        // @TODO please refactor this ugly code!
        if(Input::get('herb'))
            $thePlant->herb = 1;
        else
            $thePlant->herb = Input::get('herb');

        if(Input::get('eatable'))
            $thePlant->eatable = 1;
        else
            $thePlant->eatable = Input::get('eatable');

        $this->deletePlantAttributes($plantId);

        $thePlant->save();

        list($seasonArray, $sizeArray, $habitatArray, $colorArray) = $this->getPlantAttributes();

        for ($index = 0; $index < 4; $index++)
        {
            if(Input::hasFile('photo_' . $index))
            {
                $photo = Input::file('photo_' . $index);
                $this->photoHandler->edit($plantId, $index, $photo);
            }

            if(Input::get($index))
                $this->photoHandler->edit($plantId, $index, null);
        }

        $this->sizeHandler->edit($plantId, $sizeArray);
        $this->seasonHandler->edit($plantId, $seasonArray);
        $this->habitatHandler->edit($plantId, $habitatArray);
        $this->colorHandler->edit($plantId, $colorArray);

        return Redirect::to('plant-detail/' . $plantId);
    }

    /**
     * @param $plantId
     */
    public function deletePlantAttributes($plantId)
    {
        $this->colorHandler->delete($plantId);
        $this->habitatHandler->delete($plantId);
        $this->seasonHandler->delete($plantId);
        $this->sizeHandler->delete($plantId);
    }

    /**
     * @return array
     */
    public function getPlantAttributes()
    {
        $seasonArray = array('spring' => Input::get('spring'), 'summer' => Input::get('summer'),
            'autumn' => Input::get('autumn'), 'winter' => Input::get('winter'));

        $sizeArray = array('10' => Input::get('10'), '10-25' => Input::get('10-25'), '25-40' => Input::get('25-40'),
            '40-50' => Input::get('40-50'), '50-75' => Input::get('50-75'), '75-100' => Input::get('75-100'),
            '100' => Input::get('100'));

        $habitatArray = array('farmland' => Input::get('farmland'), 'wetland' => Input::get('wetland'),
            'forest' => Input::get('forest'), 'moor' => Input::get('moor'), 'coast' => Input::get('coast'));

        $colorArray = array('red' => Input::get('red'), 'yellow' => Input::get('yellow'), 'blue' => Input::get('blue'),
            'green' => Input::get('green'), 'brown' => Input::get('brown'), 'black' => Input::get('black'),
            'white' => Input::get('white'), 'purple' => Input::get('purple'), 'orange' => Input::get('orange'));
        return array($seasonArray, $sizeArray, $habitatArray, $colorArray);
    }
}