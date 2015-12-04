<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 30/10/2015
 * Time: 16.42
 */
class PlantHandler implements IPlantHandler
{
    protected $photoHandler, $habitatHandler, $colorHandler, $sizeHandler, $seasonHandler, $applicationHandler;

    public function __construct(IPhotoHandler $photoHandler, IColorHandler $colorHandler, IHabitatHandler $habitatHandler,
                                ISeasonHandler $seasonHandler, ISizeHandler $sizeHandler, IApplicationHandler $applicationHandler)
    {
        $this->photoHandler = $photoHandler;
        $this->colorHandler = $colorHandler;
        $this->habitatHandler = $habitatHandler;
        $this->seasonHandler = $seasonHandler;
        $this->sizeHandler = $sizeHandler;
        $this->applicationHandler = $applicationHandler;
    }


    public function get($plantID)
    {
        $attributeArray = array(
            'plant' => Plants::find($plantID),
            'sizes' => $this->sizeHandler->get($plantID),
            'seasons' => $this->seasonHandler->get($plantID),
            'habitats' => $this->habitatHandler->get($plantID),
            'photos' => $this->photoHandler->get($plantID),
            'colors' => $this->colorHandler->get($plantID),
            'applications' => $this->applicationHandler->get($plantID),
        );

        return $attributeArray;
    }


    /**
     * Handles all the attributes on the plant and separate
     * each data out to the given handler.
     * Returns the newly created plants id for further use.
     */
    public function set($attributeArray)
    {
        $plantID = DB::table('plants')->insertGetId(
            array('name' => $attributeArray['plant']['name'], 'name_latin' => $attributeArray['plant']['latin'],
                'description' => $attributeArray['plant']['description'], 'history' => $attributeArray['plant']['history'])
        );

        $this->sizeHandler->set($plantID, $attributeArray['size']);
        $this->seasonHandler->set($plantID, $attributeArray['season']);
        $this->habitatHandler->set($plantID, $attributeArray['habitat']);
        $this->colorHandler->set($plantID, $attributeArray['color']);
        $this->applicationHandler->set($plantID, $attributeArray['application']);

        for ($index = 0; $index < 4; $index++)
            $this->photoHandler->set($plantID, $index, $attributeArray['photo'][$index]);

        return $plantID;
    }

    public function delete($plantID)
    {
        $this->sizeHandler->delete($plantID);
        $this->seasonHandler->delete($plantID);
        $this->habitatHandler->delete($plantID);
        $this->colorHandler->delete($plantID);
        $this->applicationHandler->delete($plantID);
        $this->photoHandler->delete($plantID);
        Plants::where('id', '=', $plantID)->delete();
    }

    public function edit($plantID, $attributeArray)
    {
        $thePlant = Plants::find($plantID);
        $thePlant->name = $attributeArray['plant']['name'];
        $thePlant->name_latin = $attributeArray['plant']['latin'];
        $thePlant->description = $attributeArray['plant']['description'];
        $thePlant->history = $attributeArray['plant']['history'];
        $thePlant->save();

        $this->sizeHandler->edit($plantID, $attributeArray['size']);
        $this->seasonHandler->edit($plantID, $attributeArray['season']);
        $this->habitatHandler->edit($plantID, $attributeArray['habitat']);
        $this->colorHandler->edit($plantID, $attributeArray['color']);
        $this->applicationHandler->edit($plantID, $attributeArray['application']);

        /*if(!empty($attributeArray['photo']))
            for ($index = 0; $index < sizeof($attributeArray['photo']); $index++)
                $this->photoHandler->edit($plantID, $index, $attributeArray['photo'][$index]);*/
    }
}