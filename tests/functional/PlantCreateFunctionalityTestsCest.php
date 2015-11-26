<?php
use \FunctionalTester;

class PlantCreateFunctionalityTestsCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/add-new-plant');
        $this->createSimplePlant($I);
    }

    protected function createSimplePlant($I)
    {
        $I->fillField('#name', 'Test plant');
        $I->fillField('#name_latin', 'Test plant latin');
        $I->fillField('#description', 'Test description of a test plant');
        $I->fillField('#history', 'Test history of a test plant');
        $I->attachFile('input[name=photo_0]', 'test.jpg');
        $I->attachFile('input[name=photo_1]', 'test.jpg');
        $I->attachFile('input[name=photo_2]', 'test.jpg');
        $I->attachFile('input[name=photo_3]', 'test.jpg');
    }

    protected function getPlantID($I)
    {
        return $I->grabRecord('plants', array('name' => 'Test plant'))->id;
    }

    public function createSimplePlantTest(FunctionalTester $I)
    {
        $I->click('html/body/div[5]/form/div[3]/input');

        $I->seeRecord('plants', [
            'name' => 'Test plant',
            'name_latin' => 'Test plant latin',
            'description' => 'Test description of a test plant',
            'history' => 'Test history of a test plant'
        ]);
    }

    public function createPlantWithSeasonTest(FunctionalTester $I)
    {
        $I->checkOption('spring'); //season_id = 1
        $I->checkOption('summer'); //season_id = 2
        $I->checkOption('autumn'); //season_id = 3
        $I->checkOption('winter'); //season_id = 4

        $I->click('html/body/div[5]/form/div[3]/input');

        $plantID = $this->getPlantID($I);

        for($j = 1; $j < 4; $j++)
        {
            $I->seeRecord('plant_seasons', [
                'plant_id' => $plantID,
                'season_id' => $j
            ]);
        }
    }

    public function createPlantWithSizeTest(FunctionalTester $I)
    {
        $I->checkOption('10'); // does not get tested
        $I->checkOption('10-25');
        $I->checkOption('25-40');
        $I->checkOption('40-50');
        $I->checkOption('50-75');
        $I->checkOption('75-100');
        $I->checkOption('100'); // does not get testec

        $I->click('html/body/div[5]/form/div[3]/input');

        $plantID = $this->getPlantID($I);

        for($j = 2; $j < 7; $j++)
        {
             $I->seeRecord('plant_sizes', [
                'plant_id' => $plantID,
                'size_id' => $j
             ]);
        }
    }

    public function createPlantWithColorTest(FunctionalTester $I)
    {
        $I->checkOption('red');
        $I->checkOption('yellow');
        $I->checkOption('blue');
        $I->checkOption('green');
        $I->checkOption('brown');
        $I->checkOption('black');
        $I->checkOption('white');
        $I->checkOption('purple');
        $I->checkOption('orange');

        $I->click('html/body/div[5]/form/div[3]/input');

        $plantID = $this->getPlantID($I);

        for($j = 1; $j < 9; $j++)
        {
            $I->seeRecord('plant_colors', [
                'plant_id' => $plantID,
                'color_id' => $j
            ]);
        }
    }

    public function createPlantWithApplicationTest(FunctionalTester $I)
    {
        $I->checkOption('herb');
        $I->checkOption('thee');
        $I->checkOption('schnapps');
        $I->checkOption('pickled');
        $I->checkOption('firefood');
        $I->checkOption('pot');
        $I->checkOption('juice');
        $I->checkOption('soup');
        $I->checkOption('salad');
        $I->checkOption('dessert');
        $I->checkOption('snack');

        $I->click('html/body/div[5]/form/div[3]/input');

        $plantID = $this->getPlantID($I);

        for($j = 1; $j < 11; $j++)
        {
            $I->seeRecord('plant_applications', [
                'plant_id' => $plantID,
                'application_id' => $j
            ]);
        }
    }

    public function createPlantWithHabitatTest(FunctionalTester $I)
    {
        $I->checkOption('farmland');
        $I->checkOption('wetland');
        $I->checkOption('forest');
        $I->checkOption('moor');
        $I->checkOption('coast');

        $I->click('html/body/div[5]/form/div[3]/input');

        $plantID = $this->getPlantID($I);

        for($j = 1; $j < 5; $j++)
        {
            $I->seeRecord('plant_habitats', [
                'plant_id' => $plantID,
                'habitat_id' => $j
            ]);
        }
    }

    public function createFullPlantTest(FunctionalTester $I)
    {
        $I->checkOption('spring');
        $I->checkOption('summer');
        $I->checkOption('autumn');
        $I->checkOption('winter');

        $I->checkOption('10'); // does not get tested
        $I->checkOption('10-25');
        $I->checkOption('25-40');
        $I->checkOption('40-50');
        $I->checkOption('50-75');
        $I->checkOption('75-100');
        $I->checkOption('100'); // does not get testec

        $I->checkOption('red');
        $I->checkOption('yellow');
        $I->checkOption('blue');
        $I->checkOption('green');
        $I->checkOption('brown');
        $I->checkOption('black');
        $I->checkOption('white');
        $I->checkOption('purple');
        $I->checkOption('orange');

        $I->checkOption('herb');
        $I->checkOption('thee');
        $I->checkOption('schnapps');
        $I->checkOption('pickled');
        $I->checkOption('firefood');
        $I->checkOption('pot');
        $I->checkOption('juice');
        $I->checkOption('soup');
        $I->checkOption('salad');
        $I->checkOption('dessert');
        $I->checkOption('snack');

        $I->checkOption('farmland');
        $I->checkOption('wetland');
        $I->checkOption('forest');
        $I->checkOption('moor');
        $I->checkOption('coast');

        $I->click('html/body/div[5]/form/div[3]/input');

        $I->seeRecord('plants', [
            'name' => 'Test plant',
            'name_latin' => 'Test plant latin',
            'description' => 'Test description of a test plant',
            'history' => 'Test history of a test plant'
        ]);

        $plantID = $this->getPlantID($I);

        for($j = 1; $j < 4; $j++)
        {
            $I->seeRecord('plant_seasons', [
                'plant_id' => $plantID,
                'season_id' => $j
            ]);
        }

        for($j = 2; $j < 7; $j++)
        {
            $I->seeRecord('plant_sizes', [
                'plant_id' => $plantID,
                'size_id' => $j
            ]);
        }

        for($j = 1; $j < 9; $j++)
        {
            $I->seeRecord('plant_colors', [
                'plant_id' => $plantID,
                'color_id' => $j
            ]);
        }

        for($j = 1; $j < 11; $j++)
        {
            $I->seeRecord('plant_applications', [
                'plant_id' => $plantID,
                'application_id' => $j
            ]);
        }

        for($j = 1; $j < 5; $j++)
        {
            $I->seeRecord('plant_habitats', [
                'plant_id' => $plantID,
                'habitat_id' => $j
            ]);
        }
    }
}
