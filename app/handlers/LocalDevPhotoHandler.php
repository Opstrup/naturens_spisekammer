<?php

/**
 * Created by PhpStorm.
 * User: Opstrup
 * Date: 19/10/2015
 * Time: 16.06
 */

/*
|--------------------------------------------------------------------------
| LocalDevPhotoHandler Notes
|--------------------------------------------------------------------------
|
| The public_path() for the LocalDevPhotoHandler is
| changed to match the file system on the local
| dev machine.
|
*/

class LocalDevPhotoHandler implements IPhotoHandler
{

    public function get($plantID)
    {
        $photos = Photos::where('plant_id', '=', $plantID)->get();
        $photoArray = array();

        foreach ($photos as $photo)
        {
            $photoArray[] = $photo->photo_url;
        }

        return $photoArray;
    }

    public function set($plantID, $photoID, $photo)
    {
        if($photo == null)
        {
            $plantPhoto = new Photos;
            $plantPhoto->plant_id = $plantID;
            $plantPhoto->photo_url = 'null';
            $plantPhoto->save();
        }
        else
        {
            $fileName = $photoID . "-plant-" . $plantID . ".jpeg";
            $photoURL = "PlantPictures" . "/" . $plantID . "/";

            $plantPhoto = new Photos;
            $plantPhoto->plant_id = $plantID;
            $plantPhoto->photo_url = $photoURL . $fileName;
            $plantPhoto->save();

            $photo->move(public_path() . "/" . "PlantPictures" . "/" . $plantID . "/" , $fileName);
        }
    }

    public function delete($plantID)
    {
        File::deleteDirectory(public_path() . '/PlantPictures/' . $plantID);
        Plants::where('id', '=', $plantID)->delete();
    }

    public function edit($plantID, $photoID, $photo)
    {
        if($photo == null)
        {
            $fileName = $photoID . '-plant-' . $plantID . '.jpeg';
            $deleteRow = 'PlantPictures/' . $plantID . '/' . $fileName;

            File::delete(public_path() . '/PlantPictures/' . $plantID . '/' . $fileName);
            $photosRow = Photos::where('photo_url', '=', $deleteRow)->first();
            $photosRow->photo_url = 'null';
            $photosRow->save();
        }
        else
        {
            $fileName = $photoID . "-plant-" . $plantID . ".jpeg";
            $photoURL = "PlantPictures" . "/" . $plantID . "/";

            $editPhoto = Photos::where('plant_id', '=', $plantID)->get()[$photoID];

            $editPhoto->photo_url = $photoURL . $fileName;
            $editPhoto->save();

            $photo->move(public_path() . "/" . "PlantPictures" . "/" . $plantID . "/" , $fileName);
        }
    }

    public function crop($plantID, $cropArray)
    {
        $width = 750;
        $height = 1334;

        ini_set("memory_limit", "-1");

        for($photoID = 0; $photoID < 4; $photoID++)
        {
            $xCoordinate = intval($cropArray['photo-' . $photoID]['x']);
            $yCoordinate = intval($cropArray['photo-' . $photoID]['y']);
            $fileName = $photoID . '-plant-' . $plantID . '.jpeg';

            Image::make(public_path() . "/" . "PlantPictures" . "/" . $plantID . "/" . $fileName)->crop($width, $height, $xCoordinate, $yCoordinate)->save();
        }

    }

}