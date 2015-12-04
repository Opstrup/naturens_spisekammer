<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 18/08/15
 * Time: 14.40
 */
class PlantController extends BaseController
{
    protected $photoHandler, $habitatHandler, $colorHandler, $sizeHandler, $seasonHandler, $applicationHandler;
    protected $plantHandler;

    public function __construct(IPhotoHandler $photoHandler, IColorHandler $colorHandler, IHabitatHandler $habitatHandler,
                                ISeasonHandler $seasonHandler, ISizeHandler $sizeHandler, IApplicationHandler $applicationHandler, IPlantHandler $plantHandler)
    {
        $this->photoHandler = $photoHandler;
        $this->colorHandler = $colorHandler;
        $this->habitatHandler = $habitatHandler;
        $this->seasonHandler = $seasonHandler;
        $this->sizeHandler = $sizeHandler;
        $this->applicationHandler = $applicationHandler;
        $this->plantHandler = $plantHandler;
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
        $data = $this->plantHandler->get($plantId);

        return View::make('plantDetailView')->with('data', $data);
    }

    /**
     * Adds a new plant to the database with all the dependency set up
     * for it. The view is at url /add-new-plant
     */
    public function addNewPlantToDb()
    {
        $attributeArray = $this->getPlantAttributes();
        $attributeArray['photo'] = $this->getPhotosForNewPlant();
        $newPlantId = $this->plantHandler->set($attributeArray);

/*      for ($index = 0; $index < 4; $index++)
        {
            if(Input::hasFile('photo_' . $index))
            {
                $photo = Input::file('photo_' . $index);
                $this->photoHandler->set($newPlantId, $index, $photo);
            }
            else
            {
                $this->photoHandler->set($newPlantId, $index, null);
            }
        }*/

        $photoArray = $this->photoHandler->get($newPlantId);

        $data = array(
            'photos' => $photoArray,
            'plantID' => $newPlantId
        );

        return View::make('cropView')->with('data', $data);
    }

    /**
     * Gets the x and y coordinates for cropping for each photo
     * the cropping is 750px in width and 1334px in height.
     */
    public function cropPhotos()
    {
        $plantID = Input::get('plantID');

        $cropArray = array (
            "photo-0" => array ( "x" => Input::get('photo_0x'), "y" => Input::get('photo_0y') ),
            "photo-1" => array ( "x" => Input::get('photo_1x'), "y" => Input::get('photo_1y') ),
            "photo-2" => array ( "x" => Input::get('photo_2x'), "y" => Input::get('photo_2y') ),
            "photo-3" => array ( "x" => Input::get('photo_3x'), "y" => Input::get('photo_3y') ), );

        $this->photoHandler->crop($plantID, $cropArray);

        return Redirect::to('plant-detail/' . $plantID);
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
        $this->plantHandler->delete($plantId);

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
        $applicationArray = $this->applicationHandler->get($plantId);

        $data = array(
            'plant' => $thePlant,
            'seasons' => $seasonArray,
            'colors' => $colorArray,
            'habitats' => $habitatArray,
            'sizes' => $sizeArray,
            'photos' => $photoArray,
            'applications' => $applicationArray,
        );

        return View::make('editPlantView')->with('data', $data);
    }

    public function editPlant()
    {
        // New code
        $plantID = Input::get('plantId');
        $attributesArray = $this->getPlantAttributes();
//        $attributesArray['photo'] = $this->getPhotosForEdit();
        $this->plantHandler->edit($plantID, $attributesArray);

        // Refactor this out!
        for ($index = 0; $index < 4; $index++)
        {
            if(Input::hasFile('photo_' . $index))
            {
                $photo = Input::file('photo_' . $index);
                $this->photoHandler->edit($plantID, $index, $photo);
            }

            if(Input::get($index))
                $this->photoHandler->edit($plantID, $index, null);
        }

        $data = array(
            'photos' => $this->photoHandler->get($plantID),
            'plantID' => $plantID
        );

        return View::make('cropView')->with('data', $data);
    }

    /**
     * @return array with all the attributes for the plant
     */
    protected function getPlantAttributes()
    {
        $plantArray = array('name' => Input::get('name'), 'latin' => Input::get('name_latin'),
            'description' => Input::get('description'), 'history' => Input::get('history'));

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

        $applicationArray = array('herb' => Input::get('herb'), 'thee' => Input::get('thee'), 'schnapps' => Input::get('schnapps'),
            'pickled' => Input::get('pickled'), 'firefood' => Input::get('firefood'), 'pot' => Input::get('pot'), 'juice' => Input::get('juice'),
            'soup' => Input::get('soup'), 'salad' => Input::get('salad'), 'dessert' => Input::get('dessert'), 'snack' => Input::get('snack'));

        /*$photoArray = array();

        for ($index = 0; $index < 4; $index++)
        {
            if(Input::hasFile('photo_' . $index))
            {
                $photoArray[] = Input::file('photo_' . $index);
            }
            elseif(Input::get($index))
            {
                $photoArray[] = null;
            }
            elseif(!Input::hasFile('photo_' . $index))
            {
                $photoArray[] = null;
            }
        }*/

        return array('plant' => $plantArray, 'season' => $seasonArray, 'size' => $sizeArray,
            'habitat' => $habitatArray, 'color' => $colorArray, 'application' => $applicationArray/*, 'photo' => $photoArray*/);
    }

    protected function getPhotosForEdit()
    {
        $photoArray = array();

        for ($index = 0; $index < 4; $index++) {
            if (Input::hasFile('photo_' . $index)) {
                $photoArray[] = Input::file('photo_' . $index);
            }
            elseif(Input::get($index))
            {
                $photoArray[] = null;
            }
        }

        return $photoArray;
    }

    protected function getPhotosForNewPlant()
    {
        $photoArray = array(null, null, null, null);

        for ($index = 0; $index < 4; $index++) {
            if (Input::hasFile('photo_' . $index)) {
                $photoArray[$index] = Input::file('photo_' . $index);
            }
        }

        return $photoArray;
    }
}