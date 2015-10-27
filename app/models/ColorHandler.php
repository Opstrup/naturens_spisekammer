<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 26/10/2015
 * Time: 10.38
 */

/*
|--------------------------------------------------------------------------
| ColorHandler Notes
|--------------------------------------------------------------------------
|
| ColorHandler class implements IColor and
| handles all interaction with the
| colors for the plants.
|
*/

class ColorHandler implements IColorHandler
{

    protected $translationsArray = array('rød' => 'red', 'gul' => 'yellow', 'blå' => 'blue',
                                         'grøn' => 'green', 'brun' => 'brown', 'hvid' => 'white',
                                         'sort' => 'black', 'lilla' => 'purple');

    public function get($plantID)
    {
        $colorsForPlant = PlantColor::where('plant_id', '=', $plantID)->get();
        $colorArray = array();
        $translatedColorArray = array();

        foreach ($colorsForPlant as $color)
        {
            $colorArray[] = Colors::where('id', '=', $color['color_id'])->get()[0]['color'];
        }

        foreach ($colorArray as $color)
        {
            if(array_search($color, $this->translationsArray))
                $translatedColorArray[] = array_search($color, $this->translationsArray);
        }

        return $translatedColorArray;
    }

    public function set($plantID, $colorsArray)
    {
        $colors = Colors::all();
        $colorsArray = $this->filterArray($colorsArray);
        $cleanColors = $this->cleanModelArray($colors);

        foreach($colorsArray as $color)
        {
            if(is_numeric(array_search($color, $cleanColors)))
            {
                $newColor = new PlantColor;
                $newColor->plant_id = $plantID;
                $newColor->color_id = array_search($color, $cleanColors) + 1;
                $newColor->save();
            }
        }
    }

    public function delete($plantID)
    {
        PlantColor::where('plant_id', '=', $plantID)->delete();
    }

    public function edit($plantID, $colorsArray)
    {
        $this->delete($plantID);
        $this->set($plantID, $colorsArray);
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