<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 27/10/2015
 * Time: 11.35
 */
class SeasonHandler implements ISeasonHandler
{

    public function get($plantID)
    {
        // TODO: Implement get() method.
    }

    public function set($plantID, $seasonArray)
    {
        // TODO: Implement set() method.
    }

    public function delete($plantID)
    {
        // TODO: Implement delete() method.
    }

    public function edit($plantID, $seasonArray)
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
            $cleanArray[] = $element->color;
        }

        return $cleanArray;
    }
}