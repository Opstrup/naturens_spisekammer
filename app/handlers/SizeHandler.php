<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 27/10/2015
 * Time: 11.36
 */
class SizeHandler implements ISizeHandler
{

    public function get($plantID)
    {
        $sizesForPlant = PlantSize::where('plant_id', '=', $plantID)->get();
        $sizeArray = array();

        foreach ($sizesForPlant as $size)
        {
            $sizeArray[] = Sizes::where('id', '=', $size['size_id'])->get()[0]['size'];
        }

        return $sizeArray;
    }

    public function set($plantID, $sizeArray)
    {
        $sizes = Sizes::all();
        $sizeArray = $this->filterArray($sizeArray);
        $cleanSizes = $this->cleanModelArray($sizes);

        foreach($sizeArray as $size)
        {
            if(is_numeric(array_search($size, $cleanSizes)))
            {
                $newSize = new PlantSize();
                $newSize->plant_id = $plantID;
                $newSize->size_id = array_search($size, $cleanSizes) + 1;
                $newSize->save();
            }
        }
    }

    public function delete($plantID)
    {
        PlantSize::where('plant_id', '=', $plantID)->delete();
    }

    public function edit($plantID, $sizeArray)
    {
        $this->delete($plantID);
        $this->set($plantID, $sizeArray);
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
            $cleanArray[] = $element->size;
        }

        return $cleanArray;
    }
}