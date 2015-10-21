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
| changed to match the file system on godaddy.
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
        $fileName = $photoID . "-plant-" . $plantID . ".jpeg";
        $photoURL = "PlantPictures" . "/" . $plantID . "/";

        $plantPhoto = new Photos;
        $plantPhoto->plant_id = $plantID;
        $plantPhoto->photo_url = $photoURL . $fileName;
        $plantPhoto->save();

        $photo->move(public_path() . "/" . "PlantPictures" . "/" . $plantID . "/" , $fileName);
    }

    public function delete($plantID, $photoID)
    {
        $fileName = $photoID . '-plant-' . $plantID . '.jpeg';
        $deleteRow = 'PlantPictures/' . $plantID . '/' . $fileName;

        File::delete(public_path() . '/PlantPictures/' . $plantID . '/' . $fileName);
        $photosRow = Photos::where('photo_url', '=', $deleteRow)->first();
        $photosRow->photo_url = 'null';
        $photosRow->save();
    }

    public function edit($plantID, $photoID, $photo)
    {
        $fileName = $photoID . "-plant-" . $plantID . ".jpeg";
        $photoURL = "PlantPictures" . "/" . $plantID . "/";

        $editPhoto = Photos::where('plant_id', '=', $plantID)
            ->where('photo_url', '=', 'null')
            ->first();

        $editPhoto->photo_url = $photoURL . $fileName;
        $editPhoto->save();

        $photo->move(public_path() . "/" . "PlantPictures" . "/" . $plantID . "/" , $fileName);
    }
}