<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 27/10/2015
 * Time: 11.34
 */
class HabitatHandler implements IHabitatHandler
{
    protected $translationsArray = array('Agerland' => 'farmland', 'Vådområde' => 'wetland', 'Skov og hegn' => 'forest',
                                         'Hede' => 'moor', 'Kyst' => 'coast');

    public function get($plantID)
    {
        $habitatsForPlant = PlantHabitat::where('plant_id', '=', $plantID)->get();
        $habitatArray = array();
        $translatedHabitatArray = array();

        foreach ($habitatsForPlant as $habitat)
        {
            $habitatArray[] = Habitats::where('id', '=', $habitat['habitat_id'])->get()[0]['habitat'];
        }

        foreach ($habitatArray as $habitat)
        {
            if(array_search($habitat, $this->translationsArray))
                $translatedHabitatArray[] = array_search($habitat, $this->translationsArray);
        }

        return $translatedHabitatArray;
    }

    public function set($plantID, $habitatArray)
    {
        $habitats = Habitats::all();
        $habitatArray = $this->filterArray($habitatArray);
        $cleanHabitats = $this->cleanModelArray($habitats);

        foreach($habitatArray as $habitat)
        {
            if(is_numeric(array_search($habitat, $cleanHabitats)))
            {
                $newHabitat = new PlantHabitat;
                $newHabitat->plant_id = $plantID;
                $newHabitat->habitat_id = array_search($habitat, $cleanHabitats) + 1;
                $newHabitat->save();
            }
        }
    }

    public function delete($plantID)
    {
        PlantHabitat::where('plant_id', '=', $plantID)->delete();
    }

    public function edit($plantID, $habitatArray)
    {
        $this->delete($plantID);
        $this->set($plantID, $habitatArray);
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
            $cleanArray[] = $element->habitat;
        }

        return $cleanArray;
    }
}