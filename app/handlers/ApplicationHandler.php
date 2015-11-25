<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 23/11/2015
 * Time: 14.10
 */
class ApplicationHandler implements IApplicationHandler
{
    protected $translationArray = array('Krydderi' => 'herb', 'The' => 'thee', 'Snaps' => 'schnapps',
                                        'Sylte' => 'pickled', 'Bålmad' => 'firefood', 'Gryderet' => 'pot', 'Saft' => 'juice',
                                        'Suppe' => 'soup', 'Salat' => 'salad', 'Dessert' => 'dessert', 'Snack' => 'snack');

    public function get($plantID)
    {
        $applicationsForPlant = PlantApplication::where('plant_id', '=', $plantID)->get();
        $applicationArray = array();
        $translatedApplicationArray = array();

        foreach ($applicationsForPlant as $application)
        {
            $applicationArray[] = Applications::where('id', '=', $application['application_id'])->get()[0]['application'];
        }

        foreach ($applicationArray as $application)
        {
            if(array_search($application, $this->translationArray))
                $translatedApplicationArray[] = array_search($application, $this->translationArray);
        }

        return $translatedApplicationArray;
    }

    public function set($plantID, $applicationArray)
    {
        $applications = Applications::all();
        $applicationArray = $this->filterArray($applicationArray);
        $cleanApplications = $this->cleanModelArray($applications);

        foreach($applicationArray as $application)
        {
            if(is_numeric(array_search($application, $cleanApplications)))
            {
                $newApplication = new PlantApplication;
                $newApplication->plant_id = $plantID;
                $newApplication->application_id = array_search($application, $cleanApplications) + 1;
                $newApplication->save();
            }
        }
    }

    public function delete($plantID)
    {
        PlantApplication::where('plant_id', '=', $plantID)->delete();
    }

    public function edit($plantID, $applicationArray)
    {
        $this->delete($plantID);
        $this->set($plantID, $applicationArray);
    }

    protected function filterArray($array)
    {
        $cleanArray = array();

        foreach($array as $key => $element)
        {
            if($element)
                $cleanArray[] = $key;
        }

        return $cleanArray;
    }

    protected function cleanModelArray($array)
    {
        $cleanArray = array();

        foreach($array as $element)
        {
            $cleanArray[] = $element->application;
        }

        return $cleanArray;
    }
}