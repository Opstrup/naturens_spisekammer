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
        // TODO: Implement get() method.
    }

    public function set($plantID, $sizeArray)
    {
        // TODO: Implement set() method.
    }

    public function delete($plantID)
    {
        PlantSeason::where('plant_id', '=', $plantID)->delete();
    }

    public function edit($plantID, $sizeArray)
    {
        // TODO: Implement edit() method.
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