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

    public function set($plantID)
    {
        // TODO: Implement set() method.
    }

    public function delete($plantID)
    {
        // TODO: Implement delete() method.
    }

    public function edit($plantID)
    {
        // TODO: Implement edit() method.
    }
}